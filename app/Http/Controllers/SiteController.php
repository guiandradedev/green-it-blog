<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Http\Requests\StoreContactRequest;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use App\Models\PostPhoto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function __construct(
        protected Post $post,
        protected Comment $comments,
        protected PostPhoto $photo,
        protected User $user,
        protected Contact $contact
    ) {}

    public static string $author_repository = '/app/public/avatars';


    public function about() {
        $posts = $this->post
            ->where('status', PostStatus::PUBLICADO->name)
            ->orderBy('created_at', 'desc')
            ->take(10)->get();

        $members = $this->user->where('username', '!=', null)->get();

        return view('guest.about', ['posts'=>$posts, 'members'=>$members]);
    }

    public function home(Request $request) {
        $posts = $this->post
        ->where('status', PostStatus::PUBLICADO->name)
        ->orderBy('created_at', 'desc')
        ->paginate($request->get('per_page', 3), ['*'], 'page', $request->get('page', 1));
    
        return view('welcome', ['posts'=>$posts]);
    }
    
    public function blog(Request $request) {
        $posts = $this->post
        ->where('status', PostStatus::PUBLICADO->name)
        ->orderBy('created_at', 'desc')
        ->paginate($request->get('per_page', 3), ['*'], 'page', $request->get('page', 1));
    
        return view('guest.blog', ['posts'=>$posts]);
    }

    public function author(Request $request) {
        $user = $this->user->where('username', $request->author)->first();
        if(!$user) {
            return redirect()->back()->withErrors(['slug'=> 'Este user nao existe.'])->withInput();
        }

        $posts = $this->post
            ->where('status', PostStatus::PUBLICADO->name)
            ->orderBy('created_at', 'desc')
            ->take(10)->get();
        
        $author_posts = $this->post
            ->where('status', PostStatus::PUBLICADO->name)
            ->where('author_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate($request->get('per_page', 3), ['*'], 'page', $request->get('page', 1));

        return view('author.show', ['author'=>$user, 'posts'=>$posts, 'authorPosts'=>$author_posts]);
    }

    public function contact(){
        $posts = $this->post
        ->where('status', PostStatus::PUBLICADO->name)
        ->orderBy('created_at', 'desc')
        ->take(10)->get();
        return view('guest.contact',['posts'=>$posts]);
    }

    public function contactStore(StoreContactRequest $request){
        //$this->authorize('create', [Post::class]);

        $this->contact->create([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content
        ]);
        
        return redirect()->route('home');
    }

    public function contactIndex(){
        $contacts = $this->contact->all();

        return view('admin.contact.index',['contacts'=>$contacts]);
    }

    public function contactShow(Request $request){
        $contact = $this->contact->where('id',$request->id)->first();

        return view('admin.contact.show',['contact'=>$contact]);
    }


    public function editProfile() {
        $user = Auth::user();
        return view('admin.edit-profile', ['user'=>$user]);
    }
    public function changePhoto(Request $request) {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();        

        $photo = $request->photo;
        
        if($upload = $this->upload_image(photo: $photo))  {
            $user->update(['avatar'=>$upload['file_path']]);
            return redirect()->back()->with('success', 'Foto atualizada com sucesso!');
        }
        return redirect()->back()->withErrors(['photo'=>'Foto invalida']);
    
        // Retornar mensagem de sucesso
    
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
            $photo->move(storage_path(self::$author_repository), $imageName);

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
    public function updateProfile(Request $request) {
        $request->validate([
            'linkedin' => 'string',
            'github' => 'string',
            'description' => 'string',
        ]);

        $linkedin = $request->linkedin;
        $github = $request->github;
        $about = $request->description;

        $user = Auth::user();

        $user->update([
            'linkedin'=>$linkedin,
            'github'=>$github,
            'about'=>$about,
        ]);

        return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
    }
}
