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
        return view('photohub', ['images' => Image::all()]);
    }

    public function photoform()
    {
        return view('uploadphoto', ['users' => User::all()]);
    }
}
