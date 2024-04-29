<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    //
    public function showComment(Request $request)
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('comments', ['comments' => $comments]);
    }

    public function store(Request $request)
    {
        // Authorize the user to create a comment
    if (Gate::denies('create-comment')) {
        abort(403, 'Unauthorized action.');
    }
        $validatedData = $request->validate([
            'name' => 'required',
            'body' => 'required',
        ]);

        $comment = new Comment();
        $comment->name = $validatedData['name'];
        $comment->body = $validatedData['body'];
        
        $comment->user_id = Auth::id(); 
        
        $comment->save();

        return redirect('/comments')->with('success', 'Comment posted successfully!');
    }

    public function myComments()
    {
         $comments = Comment::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('my-comments', compact('comments'));
    }

    public function showEdit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('editComment', compact('comment'));
    }


    public function update(Request $request, $id)
{
    $comment = Comment::findOrFail($id);

    // Authorize the user to update the comment
    if (Gate::denies('update-comment', $comment)) {
        abort(403, 'Unauthorized action.');
    }


    $validatedData = $request->validate([
        'body' => 'required|string', // Assuming 'body' is the name of the textarea input in your form.
    ]);

    $comment->body = $validatedData['body'];
    $comment->save();

    return redirect()->route('my-comments')->with('success', 'Comment updated successfully.');
}

public function destroy($id)
{
    $comment = Comment::findOrFail($id);
    $comment->delete();

    return redirect()->route('my-comments')->with('success', 'Comment deleted successfully.');
}

}
    



