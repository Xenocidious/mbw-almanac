<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Vote;
use App\Comment;
use App\User;
use Auth;
use Illuminate\Support\Facades\Http;

class PhotohubController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images = Image::get();
        $votes = Vote::get();
        $comments = Comment::get();

        return view('photohub', [
            'images' => $images,
            'votes' => $votes,
            'comments' => $comments
        ]);
    }

    public function photoform()
    {
        $users = User::get();

        return view('uploadphoto', [
            'users' => $users
        ]);
    }
}
