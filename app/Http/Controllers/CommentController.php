<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\Comment\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(
        protected Post $post,
        protected Comment $comment
    ) {}

    public function store(StoreCommentRequest $request){
        $post = $this->post->where('slug', $request->post)->first();
        if(!$post) {
            return redirect()->back()->withErrors(['post'=> 'Este post nao existe.'])->withInput();
        }
        $this->authorize('comment', [Comment::class, $post]);


        $this->comment->create([
            'content'=>$request->content,
            'user_id'=>Auth::user()->id,
            'post_id'=>$post->id
        ]);

        return redirect()->route('post.show', $post->slug)
                         ->with('success', 'Comentário adicionado com sucesso!');
    }

    public function delete(Request $request) {
        // $this->authorize('delete', [Comment::class, $comment]);

    }
}
