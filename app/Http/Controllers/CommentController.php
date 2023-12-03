<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Comment;

class CommentController extends Controller
{

    public function index(){
        $comments = Comment::orderBy("created_at","desc")->paginate(10);
        return view("comments.comments", compact("comments"));
    }
    public function create($userId, $postId){
        return view("comments.create",compact("userId","postId"));
    }
    public function store($userId, $postId, Request $request){
        $request->validate([
            'content' => 'required'
        ],[
            'content.required' => 'Необходим контент'
        ]);
        if($userId==0){
            $com = new Comment([
                'commentable_type'=>'App\Post',
                'commentable_id' => $postId,
                'content' => $request->input('content'),
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now(),
                'approved' => false
            ]);
            $com->save();
            return redirect("/")->with('success','Отзыв к посту добавлен');
        }else{
            $com = new Comment([
                'commentable_type'=>'App\User',
                'commentable_id' => $userId,
                'content' => $request->input('content'),
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now(),
                'approved' => false
            ]);
            $com->save();
            return redirect("/users/".$userId)->with('success','Отзыв к пользователю добавлен');
        }
    }

    public function approve($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->approved = true;
        $comment->save();

        return redirect()->back()->with('success', 'Комментарий одобрен');
    }

    public function reject($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->approved = false;
        $comment->save();

        return redirect()->back()->with('success', 'Комментарий не одобрен');
    }


}
