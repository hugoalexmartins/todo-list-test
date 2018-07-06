<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
  /*
   * Ensure the user is signed in to access this page
   */

  public function __construct()
  {

    $this->middleware('auth');
  }

  /**
   * Show the form to change the user password.
   */
  public function index()
  {
    return view('auth.passwords.change', array('apiToken' => \Auth::user()->api_token));
  }
}
