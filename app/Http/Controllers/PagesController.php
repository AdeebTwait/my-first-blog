<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->with('posts', $posts);
    }

    public function getAbout()
    {
        $first = 'Adeeb';
        $last = 'Twait';

        $fullname = $first . " " . $last;
        $email = 'adeebtwait@gmail.com';
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('pages.about')->with('data', $data);

    }

    public function getContact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, array(
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ));

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message,
        );

        Mail::send('emails.contact', $data, function ($message) use ($data){
            $message->from($data['email']);
            $message->to('hello@adeebtwait.io');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your Email was Sent !');

        return redirect('/');
    }

}
