<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use App\Theme;
use App\UserCity;
use App\UserImageSeen;
use function json_encode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AccountController extends Controller
{
    public const MAX_IMAGE_WIDTH = 300;
    public const MAX_IMAGE_HEIGHT = 300;

    public function index()
    {
        return view('accounts.index', [
            'user' => auth()->user(),
            'themes' => Theme::all(),
            'cities' => City::all(),
            'userCities' => UserCity::all(),
            'checkCityHighlight' => false,
            'UserImageSeen' =>UserImageSeen::all(),
        ]);
    }

    public function indexHighlighted()
    {
        return view('accounts.index', [
            'user' => auth()->user(),
            'themes' => Theme::all(),
            'cities' => City::all(),
            'userCities' => UserCity::all(),
            'checkCityHighlight' => true,
            'UserImageSeen' =>UserImageSeen::all(),
        ]);
    }


    public function selectCities(){

    }

    public function update(User $user, Request $request)
    {


        if ($request->hasFile('photo')) {

            $image = $request->file('photo');
            $filename = $image->getClientOriginalName();


            $resize = Image::make($image->getRealPath());

            $ratio = $resize->getWidth() / self::MAX_IMAGE_WIDTH;

            if ($ratio > 1) {
                $resize->resize(self::MAX_IMAGE_WIDTH, $resize->getHeight() / $ratio);
            }

            $ratio = $resize->getHeight() / self::MAX_IMAGE_HEIGHT;

            if ($ratio > 1) {
                $resize->resize(self::MAX_IMAGE_WIDTH, $resize->getHeight() / $ratio);
            }



            $user->photo = $resize;


            if (!is_dir(public_path('tmp'))) {
                mkdir(public_path('tmp'));
            }

            $resize->save(public_path('tmp/' . $filename));
            $user->photo = base64_encode(file_get_contents(public_path('tmp/' . $filename)));
            unlink(public_path('tmp/' . $filename));
        }


        $user->email = $request->post('email');
        $user->name = $request->post('name');
        $user->settings = $request->post('settings');

        if ($request->has('password') && !empty($request->post('password'))) {
            if (!Hash::check($request->post('password_old'), $user->password)) {
                return redirect()->route('accounts.index')->with('error', __('Wrong password'));
            }

            if ($request->post('password') !== $request->post('password_confirmation')) {
                return redirect()->route('accounts.index')->with('error', __('New passwords do not match'));
            }

            $user->password = Hash::make($request->post('password'));
        }

        $user->save();



         // Store the record, using the new file hashname which will be it's new filename identity.
         $cityNumber = new City([
            "name" => $request->get('selectedCities'),
        ]);

        //Creating a new instance of UserCity model
        $saveCity = new UserCity;
        $allCities = UserCity::all();


        //Assigning city ID to $saveCity
        $saveCity->city_id = $cityNumber['name'];


        //Assigning User ID to $saveCity
        $saveCity->user_id = Auth::user()->id;

        foreach ($allCities as $everyCity) {
            if ($everyCity->user_id == Auth::user()->id && $everyCity->city_id == $cityNumber['name']) {
                return redirect()->route('accounts.index')->with('error', __('This city is already added'));
            }
        }

        if($saveCity->city_id != null) {
            $saveCity->save();
        }




        //Save and assign data to database


        return redirect()->route('accounts.index')->with('success', __('Account edited.'));
    }

    public function deleteFavoriteCity(Request $request, $id){
        UserCity::where('user_id',  Auth::user()->id)->where('city_id', $id)->delete();

        return redirect()->route('accounts.index')->with('success', __('City removed'));
    }

    public function destroy(User $user)
    {
        if (UserImageSeen::exists()) {
            UserImageSeen::where('user_id', $user['id'])->delete();
        }

        auth()->logout();
        $user->delete();

        return redirect('/')->with('success', __('Account deleted'));
    }
    

    public function logout(Request $request) {
        auth()->logout();
        return redirect('/')->with('success', __('Account deleted'));
    }
}
