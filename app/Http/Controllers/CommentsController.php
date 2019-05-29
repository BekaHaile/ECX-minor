<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$comments = Comment::orderBy('id','desc')->paginate(10);

        $comments = Comment::where('category','good')->latest()->get();
        $comments2 = Comment::where('category','bad')->latest()->paginate(3);
        $user = auth()->user();
        if($user->userType == 'Manager' || 'Administrator')
            return view('pages.viewComment', compact('user'))->with('comments',$comments)->with('comments2',$comments2);
        else
            return view('pages.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.comment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comments = new Comment();

        $comments->email = request('email');
        $comments->comment = request('comment');
        $comments->category = '';

        $comments->save();

        return redirect('/comments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return $comment;

        /*To forward a specific item to a different page we can use the following*/
        /*$comment = Comment::find($id);
        return view('pages.viewComment')->with('comments','$comment')*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
