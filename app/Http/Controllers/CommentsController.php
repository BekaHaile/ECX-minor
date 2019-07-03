<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use GuzzleHttp\Client;
use Mail;

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

        $commentsP = Comment::where('category','positive')->orderBy('polarity','desc')->paginate(5);
        $commentsN = Comment::where('category','negative')->orderBy('polarity','desc')->paginate(5);
        $commentsNt = Comment::where('category','neutral')->orderBy('polarity','desc')->paginate(5);

        $view = 0;

        $user = auth()->user();
        abort_unless($user->userType == 'Manager' , 403);
            return view('pages.viewComment', compact('user'))->with('commentsP',$commentsP)
                ->with('commentsN',$commentsN)->with('commentsNt',$commentsNt)->with('view',$view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Comment $comment)
    {
        $view = 0;
        return view('forms.comment')->with('view',$view);
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

        $cat = $this->categorizeComment('https://api.aylien.com/api/v1/sentiment', request('comment'));
        $comments->category = $cat->polarity;
        $comments->polarity = $cat->polarity_confidence;

        $comments->save();

        return redirect('/');
    }

    public function categorizeComment($url , $comment)
    {
        $client = new Client([
            'verify' => false
        ]);

        $response = $client->post($url, [
            'form_params' => [
                'text' => $comment
            ],
            'headers' => [
                'X-AYLIEN-TextAPI-Application-Key' => '38a35380b106011980b75f0b9a5e46c0',
                'X-AYLIEN-TextAPI-Application-ID' => '1c1eb977'
            ]
        ]);

        return json_decode($response->getBody()->getContents());
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
        $user = auth()->user();
        $view = 1;

        abort_unless($user->userType == 'Manager', 403);
        return view('forms.comment', compact('comment'))->with('view',$view)->with('user',$user);
    }
    public function commentReply(Comment $comment)
    {
        Mail::send(['text'=>'mail'],['name'=>'ECX'],function ($message){
           $message->to(request('email'))->subject('Reply to your comment to ECX');
        });
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
