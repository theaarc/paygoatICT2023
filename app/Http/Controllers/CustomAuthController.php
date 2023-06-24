<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Utilisateurs;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    public function customLogin(Request $request)
    {
        //return redirect()->route('dashboard');

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //$credentials = $request->only('email', 'password');

        //return redirect()->route('dashboard');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

       // return redirect("login")->with('message','Login details are not valid');
        return back()->withErrors(['message' => 'Invalid credentials']);
    }



    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {

        //return redirect()->route('dashboard');

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'solde' => 'required',
            'password' => 'required|min:6',
            'numero' => 'required',
        ]);

        // Create the new user record
        $user = Utilisateurs::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'solde' => $validatedData['solde'],
            'numero' => $validatedData['numero'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Create a new user
        $user = Utilisateur::create($validatedData);

        // Log in the user
        Auth::customLogin($user);
        
        // Redirect to the home page or any other desired location
        return redirect()->route('dashboard');

        //return redirect()->route('dashboard')->with('message', 'Welcome, ' . $user->name);
    }


    // public function create(array $data)
    // {
    //   return Utilisateurs::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'numero' => $data['numero'],
    //     'password' => Hash::make($data['password']),
    //     'solde' => $data['solde'],
    //   ]);
    // }


    // public function dashboard()
    // {
    //     // if(Auth::check()){
    //         return view('stock.account');
    //     // }

    //     // return redirect("login")->withSuccess('are not allowed to access');
    // }


    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
