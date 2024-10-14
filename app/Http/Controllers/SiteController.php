<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostPhoto;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct(
        protected Post $post,
        protected Comment $comments,
        protected PostPhoto $photo,
        protected User $user
    ) {}

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
        ->paginate($request->get('per_page', 3), ['*'], 'page', $request->get('page', 1));
    
        return view('welcome', ['posts'=>$posts]);
    }
    
    public function blog(Request $request) {
        $posts = $this->post
        ->where('status', PostStatus::PUBLICADO->name)
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
}
