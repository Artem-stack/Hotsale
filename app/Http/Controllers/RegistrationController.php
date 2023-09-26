<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
{
    return view('registration.index');
}

public function register(RegistrationRequest $request)
{
    // Збереження користувача в базу даних
    $user = new User([
        'name' => $request->input('name'),
        'surname' => $request->input('surname'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);
    $user->save();

    Auth::login($user);

    // Перенаправлення користувача на головну сторінку
    return route('users');
    }

    public function showUsers()
{
    $users = User::all();
    return view('index', ['users' => $users]);
    }
}
