<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FavoriteImage;
use Auth;

class FavoriteImageController extends Controller
{
    public function index()
    {
        return view('favorite-images.index')->with(
            'images', Auth::user()->favoriteImages
        );
    }

    public function store(Request $request)
    {
        $favoriteImage = new FavoriteImage();
        $favoriteImage->user_id = Auth::user()->id;
        $favoriteImage->image = base64_encode($request->file('image')->getContent());

        $favoriteImage->save();

        return redirect()->route('favorite-images.index')->with('success', __('Image saved'));
    }

    /**
     * @throws \Exception
     */
    public function destroy(FavoriteImage $favoriteImage)
    {
        $favoriteImage->delete();
        return redirect()->route('favorite-images.index')->with('success', __('Favorite image deleted'));
    }
}
