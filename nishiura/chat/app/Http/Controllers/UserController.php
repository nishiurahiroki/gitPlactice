<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Validator;
use App\Http\Requests;

class UserController extends Controller
{
    /**
      * 画面初期遷移処理
      **/
    public function initialize()
    {
      return view('userCreate');
    }

    /**
      * ユーザー情報新規登録
      */
    public function regist(Request $request)
    {

      $validator = Validator::make($request->all(),[
        'userId' => 'required',
        'userPassword' => 'required',
        'userName' => 'required'
      ],[
        'required' => ':attributeが未入力です。'
      ]);
      if($validator->fails()){
        return redirect('userCreate')
                  ->withErrors($validator)
                  ->withInput();
      }

      $user = app(App\Services\User::class);
      $isRegistSuccess = $user->regist(
        $request->input('userId'),
        $request->input('userPassword'),
        $request->input('userName'),
        $request->input('userIconFile')
      );

      if($isRegistSuccess){
        return view('top',[
          'resultMessage' => 'ユーザー情報を登録しました。'
        ]);
      }
    }

    /*
     * ユーザー情報存在可否
     **/
    public function exists(Request $request){
      $user = app(App\Services\User::class);
      $result = $user->existsUser($request->input('userId'));
      return [
        'result' => $result
      ];
    }
}
