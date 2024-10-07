<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostPhoto;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct(
        protected Post $post,
        protected Comment $comments,
        protected PostPhoto $photo
    ) {}

    public function about() {
        return view('guest.about');
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
        
    }
}
