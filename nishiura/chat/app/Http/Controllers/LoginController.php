<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Requests;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
      $user = app(App\Services\User::class);
      $userData = $user->getUserData($request->input('loginId'), $request->input('loginPassword'));
      if(is_null($userData)){
        return redirect('top')->
          withInput()->
          withErrors([
            'loginFailMessage' => 'ログインに失敗しました。'
          ]);
      }

      return view('room');
    }
}
