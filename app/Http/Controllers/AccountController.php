<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use App\Theme;
use App\UserCity;
use function json_encode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index()
    {
        return view('accounts.index', [
            'user' => auth()->user(),
            'themes' => Theme::all(),
            'cities' => City::all(),
            'userCities' => UserCity::all()
        ]);
    }


    public function selectCities(){

    }


    public function update(User $user, Request $request)
    {

         // Store the record, using the new file hashname which will be it's new filename identity.
         $cityNumber = new City([
            "name" => $request->get('selectedCities'),
        ]);

        //Creating a new instance of UserCity model
        $saveCity = new UserCity;

        //Assigning city ID to $saveCity
        $saveCity->city_id = $cityNumber['name'];

        //Assigning User ID to $saveCity
        $saveCity->user_id = Auth::user()->id;

        //Save and assign data to database
        $saveCity->save();





        if ($request->hasFile('photo')) {
            $user->photo = base64_encode($request->file('photo')->getContent());
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


        return redirect()->route('accounts.index')->with('success', __('Account edited.'));
    }

    public function destroy(User $user)
    {
        auth()->logout();
        $user->delete();

        return redirect('/')->with('success', __('Account deleted'));
    }
}
