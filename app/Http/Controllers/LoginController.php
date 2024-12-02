<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $identifier = $request->input('identifier');
        $password = $request->input('password');

        if(!$identifier || !$password) {
            return redirect()->back()->withErrors(['error' => 'Veuillez remplir tous les champs']);
        }

        $client = Clients::query()->where('identifier', $identifier)->first();

        if($client && $client->password === $password) {
            session()->put('client', $client);
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['error' => 'Identifiant ou mot de passe incorrect']);
    }
}
