<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class ItemSearch extends Model
{
	public function itemSearch ($code, $name, $isPR, $isSoldout) {

		if ($isPR == 1 && $isSoldout == 1) {
	    	$searchResult = DB::table('emp')->where('ITEM_NO', 'LIKE', "$code%")->where('ITEM_NM', 'LIKE', "%$name%")->where('IS_PR', 1)->where('STOCK_COUNT', 0)->get();
		} else if ($isPR == 0 && $isSoldout == 0) {
			$searchResult = DB::table('emp')->where('ITEM_NO', 'LIKE', "$code%")->where('ITEM_NM', 'LIKE', "%$name%")->get();
		} else if ($isPR == 1 && $isSoldout == 0) {
			$searchResult = DB::table('emp')->where('ITEM_NO', 'LIKE', "$code%")->where('ITEM_NM', 'LIKE', "%$name%")->where('IS_PR', 1)->get();
		} else {
			$searchResult = DB::table('emp')->where('ITEM_NO', 'LIKE', "$code%")->where('ITEM_NM', 'LIKE', "%$name%")->where('STOCK_COUNT', 0)->get();
		}
	    return $searchResult;
    }
}
