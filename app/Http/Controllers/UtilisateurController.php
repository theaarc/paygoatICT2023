<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;

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

            $user = Auth::user();

            $transactions = Transaction::where(function ($query) use ($user) {
                $query->where('sender', $user->id)
                    ->orWhere('receiver', $user->id);
            })->where('type', 'pay')->get();

            $payTransactionCount = $transactions->count();

            // Authentication passed
            return view('dashboard', compact('user', 'transactions', 'payTransactionCount'));
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

    public function depotUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->solde += $request->input('amount');
        $user->save();

        // Create a new transaction record
        $transaction = new Transaction();
        $transaction->sender = 0; // Replace with actual sender
        $transaction->receiver = $id; // Replace with actual receiver
        $transaction->amount = $request->input('amount');
        $transaction->number = $request->input('number');
        $transaction->type = 'deposit'; // Replace with actual type
        $transaction->client_name = 'none'; // Replace with actual type
        $transaction->client_prof = 'none'; // Replace with actual type
        $transaction->prodID = 0;
        $transaction->save();
    
        return response()->json(['message' => 'Account amount updated successfully']);
    }

    public function withDrawUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->solde -= $request->input('amount');
        $user->save();

        // Create a new transaction record
        $transaction = new Transaction();
        $transaction->sender = $id; // Replace with actual sender
        $transaction->receiver = 0; // Replace with actual receiver
        $transaction->amount = $request->input('amount');
        $transaction->number = $request->input('number');
        $transaction->type = 'retrait'; // Replace with actual type
        $transaction->client_name = 'none'; // Replace with actual type
        $transaction->client_prof = 'none'; // Replace with actual type
        $transaction->prodID = 0;
        $transaction->save();
    
        return response()->json(['message' => 'Account amount updated successfully']);
    }

    public function pay(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->solde += $request->input('amount');
        $user->save();

        // Create a new transaction record
        $transaction = new Transaction();
        $transaction->sender = 0; // Replace with actual sender
        $transaction->receiver = $id; // Replace with actual receiver
        $transaction->amount = $request->input('amount');
        $transaction->number = $request->input('number');
        $transaction->type = 'pay'; // Replace with actual type
        $transaction->client_name = $request->input('client_name'); // Replace with actual type
        $transaction->client_prof = $request->input('client_prof'); // Replace with actual type
        $transaction->prodID = $request->input('prodID');
        $transaction->save();
    
        return response()->json(['message' => 'Account amount updated successfully']);
    }
    

}
