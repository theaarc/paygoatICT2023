<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function newuser(Request $request){

        $test = Utilisateur::All();
        $user = new Utilisateur;
        $user->name = $request->name;
        $user->numero = $request->numero;
        $user->email = $request->email;
        $user->password = $request->password ;

        $user->save();

        return view("stock.login");

    }

    public function verification(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request -> only ('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('account')
                        ->with('connexion reussie');
        }
        return redirect("login")->withSuccess('Echec de la connexion');
    }

    // public function verification(Request $request){


    //     if (Auth::attempt(['email' =>$request->email, 'password' => $request->password]))
    //     {
    //         return redirect('login')->with('message', 'Reussir adresse');

    //     }else{
    //         return redirect('login')->with('message', 'Email ou mot de passe incorrect');

    //     }


    // }

}
