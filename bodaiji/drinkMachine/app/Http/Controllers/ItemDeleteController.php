<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use SearchByCode;
use Session;
use Search;

class ItemDeleteController extends Controller
{
    public function delete(Request $request) {
      $item = SearchByCode::searchByCode($request->input('deleteCode'));
      if (empty($item)) {
        $errorMessage     = "選択した商品は他の方によって削除されています。";
        $inputedCondition = Session::get('inputedCondition');
        $code             = $inputedCondition[0];
        $name             = $inputedCondition[1];
        $isPR             = $inputedCondition[2];
        $isSoldout        = $inputedCondition[3];
        $item             = Search::itemSearch($code, $name, $isPR, $isSoldout);
        return view('itemList', compact('code', 'name', 'isPR', 'isSoldout', 'item', 'errorMessage'));
      } else {
        DB::table('emp')->where('ITEM_NO', $request->input('deleteCode'))->delete();
        return redirect()->action('ItemListController@getIndex');
      }
    }
}
