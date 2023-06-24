<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function create()
    {
        return view('create-account');
    }
    public function forgot(){
     return view('forgot-password');
    }

    public function dash()
    {
      $user = Auth::user();

      //return view('home', );
      return view('dashboard', compact('user'));
    }

    public function forms()
    {
      return view('formes');
    }
    public function card()
    {
      return view('cards');
    }
    public function chart()
    {
      return view('charts');
    }
    public function table()
    {
      return view('tables');

    }/*public function button()
    {
      return view('buttons');
    }*/
   public function modal()
   {
    return view('modals');
   }

   public function payview(){
      return view('makepay');
   }


}
