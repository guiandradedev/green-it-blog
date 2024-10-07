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

    public function home() {
        $posts = $this->post
        ->where('status', PostStatus::PUBLICADO->name)
        ->get();
    
        return view('welcome', ['posts'=>$posts]);
    }
    
    public function blog() {
        $posts = $this->post
        ->where('status', PostStatus::PUBLICADO->name)
        ->get();
    
        return view('guest.blog', ['posts'=>$posts]);

    }
}
