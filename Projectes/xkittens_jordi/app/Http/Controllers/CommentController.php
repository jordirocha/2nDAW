<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function comments($mssg = null, Comment $comment = null)
    {
        $comments = null;
        $mssgResult = $mssg;
        $commentEdit = $comment;

        $title_name = "Comentarios";
        $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')->get(['users.nickname', 'users.avatar', 'comments.comment', 'comments.id'])->sortByDesc('comments.created_at')->take(8);

        if (Auth::check() && Auth::user()->role == "administrator") {

            $comments = DB::table('comments')->orderBy('comments.created_at')->paginate(7);

        }

        return view('comments', compact('comments', 'title_name', 'mssgResult', 'commentEdit'));
    }

    public function deleteComment(Comment $comment, $id)
    {
        Comment::destroy($id);

        return $this->comments("Mensaje eliminado correctamente");
    }

    public function storeComment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('comentarios')->withErrors($validator)->withInput();
        }

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();

        $mssg = "Mensaje añadido correctamente";
       // return $this->comments("Mensaje añadido correctamente");
        return redirect()->route('comments.comments', ['mssg' => $mssg]);

    }

    public function getComment(Request $request, $id)
    {

        $comment =  Comment::find($id);

        return $this->comments(null, $comment);
    }

    public function editComment(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->save();

        return $this->comments("Mensaje actualizado correctamente");
    }

}
