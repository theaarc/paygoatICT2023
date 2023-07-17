<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id); // Fetch the user based on the ID
    
        return view('external-payment', compact('user'));
    }
    
}
