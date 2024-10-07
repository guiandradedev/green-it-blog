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
        // $this->authorize('comment', [Comment::class, $post]);

        $this->comment->create([
            'content'=>$request->content,
            // 'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'post_id'=>$post->id
        ]);

        return redirect()->route('post.viewPost', $post->slug)
                         ->with('success', 'Comentário adicionado com sucesso!');
    }

    public function delete(Request $request) {
        // $post = $this->post->where('slug', sanitize_string($request->post))->first();
        // if(!$post) {
        //     return redirect()->back()->withErrors(['slug'=> 'Este post nao existe.'])->withInput();
        // }
        
        // $comment = $this->comment->where('id', $request->comment)->first();
        // if(!$comment) {
        //     return redirect()->back()->withErrors(['comment'=> 'Este comentário nao existe.'])->withInput();
        // }

        // $this->authorize('delete', [Comment::class, $comment]);

        // $comment->delete();
        
        // return redirect()->back()->with(['success'=>'Comentário deletado com sucesso!']);

    }
}
