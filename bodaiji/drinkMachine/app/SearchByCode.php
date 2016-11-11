<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class SearchByCode extends Model
{
    public function searchByCode($code) {
    	$result = DB::table('emp')->where('ITEM_NO', "$code")->get();
    	return $result;
    }
}
