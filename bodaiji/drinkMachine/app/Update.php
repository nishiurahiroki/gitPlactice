<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Update extends Model
{
    public function update($data,$code) {
    	DB::table('emp')->where('ITEM_NO', $code)
                      ->update([
                        'ITEM_NM'=>$data['ITEM_NM']
                      ]);
                      return ;
    }
}
?>
