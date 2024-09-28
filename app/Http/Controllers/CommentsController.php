<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\CourseMaterial;

class CommentsController extends Controller
{
    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function add_comment(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'material_id' => 'required|exists:course_materials,id'
        ]);

        $comment = $this->comment;
        $comment->body = $request->get('body');
        $comment->user()->associate($request->user());
        $comment->material_id = $request->get('material_id');
        $material = CourseMaterial::find($request->get('material_id'));

        $material->comments()->save($comment);

        return back()->with('success', 'تم إضافة التعليق بنجاح');
    }

    public function add_reply(Request $request)
    {
        $this->validate($request, [
            'comment_body' => 'required',
        ]);

        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $reply->commentable_id = $request->get('comment_id');
        $reply->material_id = $request->get('material_id');

        $reply->commentable_type = 'App\Models\Comment';

        // $this->comment->replies()->save($reply);
        $reply->save();

        return back()->with('success', 'تم إضافة الرد بنجاح');
    }
}
