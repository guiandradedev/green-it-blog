<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct(
        protected Post $post,
        protected Comment $comments
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->post->all();
        return view('post.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $slug = sanitize_string($request->slug);
        if($this->post->where('slug', $slug)->first()) {
            return redirect()->back()->withErrors(['slug'=> 'Este slug já existe.'])->withInput();
        }
        $post = $this->post->create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'slug' => $slug,
            'status'=> $request->status ?? PostStatus::DESABILITADO->name,
            'owner_id' => Auth::user()->id,
        ]);

        return redirect()->route('post.show',['post'=>$post->id])->with(['success'=>'Post criado com sucesso!']);
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
        $slug = sanitize_string($request->slug);
        $post->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'slug' => $slug,
            'status'=> $request->status ?? PostStatus::DESABILITADO->name,
        ]);
        return redirect()->route('post.edit', ['post'=>$slug])->with(['success'=>'Post atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
