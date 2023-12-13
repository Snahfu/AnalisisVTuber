<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;
            if ($role === "Manager") {
                return redirect('/home');
            } elseif ($role === "VTuber") {
                return redirect('/home-vtuber');
            }
        }

        return redirect('/')->withErrors('Login gagal. Periksa kembali email dan password.');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'group' => 'required|string|max:255|',
            'role' => 'required|string|max:255',
            'url_gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'instagram_link' => 'string|max:255',
            'youtube_link' => 'string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if (request()->hasFile('url_gambar')) {
            $file = $request->file('url_gambar');
            $path = $request->file('url_gambar')->storeAs('public/profile_pictures', $request['email'] . "." . $file->getClientOriginalExtension());
            $savedPath = str_replace("public", "storage", $path);
        }

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = \App\Models\User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'group' => $request->input('group'),
            'url_gambar' => $savedPath,
            'role' => $request->input('role'),
            'instagram_link' => $request->input('instagram_link'),
            'youtube_link' => $request->input('youtube_link'),
            'password' =>  Hash::make($request->input('password')),
        ]);

        Auth::login($user);
        if ($request->input('role') == "Manager") {
            return redirect('/home');
        } else {
            return redirect('/home-vtuber');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
