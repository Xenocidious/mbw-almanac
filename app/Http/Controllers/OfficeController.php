<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Image;
use App\Vote;
use App\Comment;

class OfficeController extends Controller
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

        return view('office', [
            'images' => $images,
            'votes' => $votes,
            'comments' => $comments
        ]);
    }
}
