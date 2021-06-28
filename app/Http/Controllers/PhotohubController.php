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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images = Image::all();
        $votes = Vote::all();
        $comments = Comment::all();

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
