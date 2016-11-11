<?php

namespace App\Services;

use DB;

class User
{

  /**
    * ユーザー情報を登録します
    * @param  $id           ユーザーID
    * @param  $password     パスワード
    * @param  $name         名前
    * @param  $iconFilePath ユーザーアイコンファイルパス
    * @return 結果
    */
  public function regist($id, $password, $name, $iconFilePath)
  {
    return DB::table('user')->
      insert([
        'ID' => $id,
        'PASSWORD' => $password,
        'NAME' => $name,
        'ICON_IMAGE_FILE_PATH' => $iconFilePath
      ]);
  }

  /**
   * 入力されたユーザーIDを元に、登録ユーザーが存在するか確認します
   * @param  $userId ユーザーID
   * @return 存在する場合「true」 存在しない場合「false」
   **/
   public function existsUser($userId)
   {
     $result = DB::table('user')->
                where('ID', $userId)->
                get();

     return 0 < count($result);
   }

   /**
    * 入力されたユーザーの情報を基にログイン情報をセッションに登録します。
    * @param $userId
    * @param $password
    **/
   public function getUserData($userId, $password){
      $result = DB::table('user')->
                where('ID', $userId)->
                where('PASSWORD', $password)->
                first();

      return $result;
   }
}
