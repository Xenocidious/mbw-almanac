<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Vote;
use App\Comment;
use App\User;
use Auth;
use App\UserImageSeen;
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
        UserImageSeen::where('user_id', Auth::user()->id)->update(['seen' => true]);;
        
        return view('photohub', ['images' => Image::all(), 'comments' => Comment::all()], ['upvotes' => Vote::all(), 'users' => User::all(), 'user' => auth()->user(), 'UserImageSeen' => UserImageSeen::all()]);
    }

    public function photoform()
    {
        return view('uploadphoto', ['users' => User::all(), 'UserImageSeen' => UserImageSeen::all()]);
    }
}
