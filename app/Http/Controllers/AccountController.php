<?php

namespace App\Http\Controllers;

use App\User;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use function json_encode;

class AccountController extends Controller
{
    public function index()
    {
        return view('accounts.index', [
            'user' => auth()->user(),
            'themes' => Theme::all(),
        ]);
    }

    public function update(User $user, Request $request)
    {
        if ($request->hasFile('photo')) {
            Auth::user()->photo = base64_encode($request->file('photo')->getContent());
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
