<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostPhoto;
use App\Models\References;
use Carbon\Carbon;
use DateTime;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct(
        protected Post $post,
        protected Comment $comments,
        protected PostPhoto $photo,
        protected References $references
    ) {}

    public static string $image_repository = '/app/public/thumbnails';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', [Post::class]);
        $posts = $this->post->all();
        return view('post.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', [Post::class]);
        
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $this->authorize('create', [Post::class]);

        $slug = sanitize_string($request->slug);
        if($this->post->where('slug', $slug)->first()) {
            return redirect()->back()->withErrors(['slug'=> 'Este slug já existe.'])->withInput();
        }

        $photo = $request->thumbnail;
        if (!$photo->isValid()) {
            return redirect()->back()->withErrors(['thumbnail'=> 'Foto inválida.'])->withInput();
        }
        $post = $this->post->create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'slug' => $slug,
            'status'=> $request->status ?? PostStatus::PUBLICADO->name,
            'author_id' => Auth::user()->id,
        ]);

        $photo = $request->thumbnail;
        if($upload = $this->upload_image(photo: $photo))  {
            $thumbnail = $this->photo->create([
                'file_name'=>$upload['file_name'],
                'file_path'=>$upload['file_path'],
                'file_extension'=>$upload['file_extension'],
                'mime_type'=>$upload['mime_type'],
                'file_size'=>$upload['file_size'],
                'post_id'=>$post->id,
            ]);
            $post->update(['thumbnail_id' => $thumbnail->id]);
        }
        

        return redirect()->route('post.show',['post'=>$post->slug])->with(['success'=>'Post criado com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        
        $post = $this->post->where('slug', $request->post)->first();
        if(!$post) {
            return redirect()->back()->withErrors(['slug'=> 'Este post nao existe.'])->withInput();
        }
        
        $this->authorize('view', [Post::class, $post]);
        $comments = $this->comments->where('post_id', $post->id)->get();
        // dd($comments);

        return view('post.show', ['post'=>$post, 'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $post = $this->post->where('slug', sanitize_string($request->post))->first();
        if(!$post) {
            return redirect()->back()->withErrors(['slug'=> 'Este post nao existe.'])->withInput();
        }
        $this->authorize('update', [Post::class, $post]);

        return view('post.update', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request)
    {
        $post = $this->post->where('slug', sanitize_string($request->post))->first();
        if(!$post) {
            return redirect()->back()->withErrors(['slug'=> 'Este post nao existe.'])->withInput();
        }
        $this->authorize('update', [Post::class, $post]);
        $slug = sanitize_string($request->slug);
        $post->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'slug' => $slug,
            // 'status'=> $request->status ?? PostStatus::DESABILITADO->name,
        ]);
        return redirect()->route('post.edit', ['post'=>$slug])->with(['success'=>'Post atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $post = $this->post->where('slug', sanitize_string($request->post))->first();
        if(!$post) {
            return redirect()->back()->withErrors(['slug'=> 'Este post nao existe.'])->withInput();
        }

        $this->authorize('delete', [Post::class, $post]);

        $this->comments->where('post_id', $post->id)->delete();
        $this->photo->where('post_id', $post->id)->delete();

        // remover da pasta depois

        $post->delete();
        
        return redirect()->route('post.index')->with(['success'=>'Post deletado com sucesso!']);
    }

    public function viewPost(Request $request) {
        $post = $this->post->where('slug', $request->post)
            ->where('status', PostStatus::PUBLICADO->name)
            ->first();
        
        if (!$post) {
            return redirect()->back()->withErrors(['slug'=> 'Este post não existe.'])->withInput();
        }
        $previous = $this->post
            ->where('id', '<', $post->id)
            ->where('status', PostStatus::PUBLICADO->name)
            ->orderBy('id', 'desc')
            ->first();

        $next = $this->post
            ->where('id', '>', $post->id)
            ->where('status', PostStatus::PUBLICADO->name)
            ->orderBy('id', 'asc')
            ->first();

        $post->update(['views' => $post->views + 1]);
    
        $comments = $this->comments->where('post_id', $post->id)
        ->orderBy('created_at', 'desc')
        ->paginate($request->get('per_page', 5), ['*'], 'page', $request->get('page', 1));

        $viewMore = $this->post
                        ->where('status', PostStatus::PUBLICADO->name)
                        ->orderBy('created_at', 'desc')
                        ->take(10)->get();
        
        $references = $this->references->where('post_id', $post->id)->get();
                        
        return view('guest.viewPost', [
            'post' => $post,
            'comments' => $comments,
            'previous' => $previous,
            'next' => $next,
            'references'=>$references,
            'viewMore'=>$viewMore
        ]);
    }
    

    private function upload_image($photo) {
        if ($photo->isValid()) {
            $file_name = $photo->getClientOriginalName();
            $file_extension = $photo->getClientOriginalExtension();
            $file_size = $photo->getSize();
            $mime_type = $photo->getMimeType();
            
            $imageName = sanitize_string(explode($file_extension, $file_name)[0]).time() . rand(1, 99) . '-.' . $file_extension;
            $file_path = "/".$imageName;

            // $foto->move(public_path('uploads'), $file_path);
            $photo->move(storage_path(self::$image_repository), $imageName);

            //$file_path = "/foods/".$imageName;

            return [
                "file_name"=>$file_name,
                "file_extension"=>$file_extension,
                "file_size"=>$file_size,
                "mime_type"=>$mime_type,
                "file_path"=>$file_path,
            ];
        }
        return null;
    }
    public function webscraping(Request $request) {
        $url = $request->input('url');
        if(!$url) {
            return response()->json("Informacoes invalidas", 422);
        }
        $accessed_at = $request->input('accessed_at');
        if(!$accessed_at) {
            return response()->json("Informacoes invalidas", 422);
        }
        try {
            $accessed_at = Carbon::parse($accessed_at)->translatedFormat('d \d\e M. \d\e Y');
        } catch (Exception $e) {
            return response()->json("Informacoes invalidas", 422);
        }

        $client = new Client();
        $response = $client->get($url);

        $html = (string) $response->getBody();

        $metadados = [];

        // Inicializa o DOMDocument e suprime erros
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_clear_errors();

        // Extrai o título
        $tituloTags = $dom->getElementsByTagName('title');
        if ($tituloTags->length > 0) {
            $metadados['title'] = $tituloTags->item(0)->nodeValue;
        }
        $metaTags = $dom->getElementsByTagName('meta');
        foreach ($metaTags as $meta) {
            $nome = $meta->getAttribute('name');
            $propriedade = $meta->getAttribute('property');
            $conteudo = $meta->getAttribute('content');

            if (!empty($nome)) {
                    $metadados[$nome] = $conteudo;
            } elseif (!empty($propriedade)) {
                    $metadados[$propriedade] = $conteudo;
            }
        }

        $title = $metadados['title'] ?? $metadados['og:title'] ?? $metadados['twitter:title'] ?? "TITULO-INVALIDO";
        $author = $metadados['author'] ?? "AUTOR-INVALIDO";
        if($author != "AUTOR-INVALIDO") {
            $author = $this->formatAbntName($author);
        }
        $published_at = $metadados['article:published_time'] ?? "DATA-INVALIDA";
        if ($published_at !== "DATA-INVALIDA") {
            try {
                $date = new DateTime($published_at);
                $year = $date->format('Y');
            } catch (Exception $e) {
                $year = "DATA-INVALIDA";
            }
        } else {
            $year = "DATA-INVALIDA";
        }
        $site = $metadados['og:site_name'] ?? $metadados['application-name'] ?? "SITE-INVALIDO";

        $formatted = "<strong>".$author."</strong>. ".$title.". <strong>".$site."</strong>, ".$year.". Disponível em: ".$url.". Acesso em: ".$accessed_at;

        return response()->json(['reference'=>$formatted], 201);
    }

    private function formatAbntName($name) {
        $nameParts = explode(' ', $name);

        $firstName = array_shift($nameParts);

        $lastName = strtoupper(array_pop($nameParts));
        $initials = '';

        foreach ($nameParts as $part) {
            $initials .= strtoupper(substr($part, 0, 1)) . '. ';
        }

        $initials = trim($initials);

        return "{$lastName}, {$firstName} {$initials}";
    }
    public function changeThumbnail(Request $request) {
        $post = $this->post->where('slug', sanitize_string($request->post))->first();
        if(!$post) {
            return redirect()->back()->withErrors(['slug'=> 'Este post nao existe.'])->withInput();
        }
        $this->authorize('update', [Post::class, $post]);

        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photo = $request->thumbnail;
        
        if($upload = $this->upload_image(photo: $photo))  {
            $thumbnail = $this->photo->create([
                'file_name'=>$upload['file_name'],
                'file_path'=>$upload['file_path'],
                'file_extension'=>$upload['file_extension'],
                'mime_type'=>$upload['mime_type'],
                'file_size'=>$upload['file_size'],
                'post_id'=>$post->id,
            ]);
            $post->update(['thumbnail_id' => $thumbnail->id]);
            return redirect()->back()->with('success', 'Foto atualizada com sucesso!');
        }
        return redirect()->back()->withErrors(['photo'=>'Foto invalida']);
    
        // Retornar mensagem de sucesso
    
    }
}
