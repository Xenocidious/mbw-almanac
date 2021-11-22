<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\UserImageSeen;
use App\Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        return Route('home');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (Image::exists()) {
            $maxImage = Image::where('id', \DB::raw("(select max(`id`) from Images)"))->get();
        
            $newUserID = User::where('id', \DB::raw("(select max(`id`) from Users)"))->get();
            $newUserID = $newUserID[0]['id'] + 1;
    
            for($i=0; $i<=$maxImage[0]['id']; $i++){
                if (image::where('id', $i)->exists()) {
                    $newRow = new UserImageSeen([
                        "user_id" => $newUserID,
                        "image_id" => $i,
                    ]);
    
                    $newRow->save();
                }
            }
        }else{
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'darkmode' => 1
        ]);     
    }
}