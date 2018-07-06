<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Return home view.
   * Add apiToken receip for Angular.
   *
   * @return Response
   */
  public function index()
  {
    return view('home', array('apiToken' => \Auth::user()->api_token));
  }

  /**
   * Return todoctrl view of Angular controller.
   * (might be not necessary)
   *
   * @return Response
   */
  public function todoCtrl()
  {
    return view('todo/todoctrl');
  }

}
