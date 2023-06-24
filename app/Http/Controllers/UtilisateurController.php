<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;


class UtilisateurController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'solde' => 'required',
            'password' => 'required|min:6',
            'numero' => 'required',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->solde = $validatedData['solde'];
        $user->numero = $validatedData['numero'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        Auth::login($user);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->route('home');
        } else {
            // Authentication failed
            return redirect()->back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function updateAccountAmount(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->solde += $request->input('amount');
        $user->save();
    
        return response()->json(['message' => 'Account amount updated successfully']);
    }

}
