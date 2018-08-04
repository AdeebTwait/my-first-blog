<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'name'      =>  'required|max:255',
            'email'     =>  'required|email|max:255',
            'comment'   =>  'required|min:5|max:2000'
        ));

        $post = Post::find($post_id);

        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Comment was added !');

        return redirect()->route('blog.single', [$post->slug]);
    }



    /**
     * Remove the specified resource from storagd code
     * cd bloge.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('comments.delete')->with('comment', $comment);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();
        Session::flash('success', 'Comment Deleted !');
        return redirect()->route('posts.show', $post_id);
    }
}
