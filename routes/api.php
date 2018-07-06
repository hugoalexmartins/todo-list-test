<?php

use App\Todo;
use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
});
    
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function() {  
  
  // retreive Todos from current user
  Route::get('todos', function(){
    $todos = Todo::where('user_id', \Auth::guard('api')->id())
              ->orderBy('created_at', 'asc')
              ->get();
    return $todos;
  });
  
  // create a Todo from current user
  Route::post('todos', function(Request $request){
    return Todo::create(array_merge($request->all(), array('user_id' => \Auth::guard('api')->id())));
  });
  
  // update a Todo
  Route::put('todos/{id}', function(Request $request, $id) {
    $todo = Todo::findOrFail($id);
    $todo->update($request->all());

    return $todo;
  });
  
  
  // delete done Todo's from current user
  Route::delete('todos', function() {
    Todo::where(array(
          'user_id' => \Auth::guard('api')->id(),
          'is_done' => true
        ))->delete();
    
    return array('success' => true);
  });
  
  // delete a Todo
  Route::delete('todos/{id}', function($id) {
    Todo::findOrFail($id)->delete();
    
    return array('success' => true);
  });
  
  
  // update a User password
  Route::put('user', function(Request $request) {
    
    $user = User::find(\Auth::guard('api')->id());
    $hashedPassword = $user->password;
    
    if (Hash::check($request->old, $hashedPassword)) {
      $user->fill([
          'password' => Hash::make($request->password)
      ])->save(); 
      return array('success' => true);
    }
    return array('success' => false, 'errors' => array('password doesnt match'));
  });
  
  
});
