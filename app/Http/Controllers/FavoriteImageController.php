        $favoriteImage = new FavoriteImage();
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FavoriteImage;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

class FavoriteImageController extends Controller
{
    public const MAX_IMAGE_WIDTH = 300;

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
//        $favoriteImage->image = base64_encode($request->file('image')->getContent());

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();

        $resize = Image::make($image->getRealPath());
        $ratio = $resize->getWidth() / self::MAX_IMAGE_WIDTH;

        if ($ratio > 1) {
            $resize->resize(self::MAX_IMAGE_WIDTH, $resize->getHeight() / $ratio);
        }

        if (!is_dir(public_path('tmp'))) {
            mkdir(public_path('tmp'));
        }

        $resize->save(public_path('tmp/' . $filename));
        $favoriteImage->image = base64_encode(file_get_contents(public_path('tmp/' . $filename)));
        unlink(public_path('tmp/' . $filename));

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
