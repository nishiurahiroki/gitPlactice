<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Search;
use SearchByCode;
use Session;

class ItemListController extends Controller
{
    /**
     * 一覧画面を表示します。
     * @return 一覧画面
     */
    public function getIndex() {
    	$code         = "";
    	$name         = "";
    	$isPR         = "";
    	$isSoldout    = "";
      /*
       * 「検索結果が保持されていて検索条件が保持されていない場合」等の
       * 場合分けで分岐しています。
       */
    	 if (empty(Session::get('searchResult')) && empty(Session::get('inputedCondition'))) {
    			 return view('itemList', compact('code', 'name', 'isPR', 'isSoldout'));
    	 } else if (!empty(Session::get('searchResult')) && empty(Session::get('inputedCondition'))){
           $item = Session::get('searchResult');
           return view('itemList', compact('code', 'name', 'isPR', 'isSoldout', 'item'));
       } else if (empty(Session::get('searchResult')) && !empty(Session::get('inputedCondition'))){
           $inputedCondition = Session::get('inputedCondition');
           $code             = $inputedCondition[0];
           $name             = $inputedCondition[1];
           $isPR             = $inputedCondition[2];
           $isSoldout        = $inputedCondition[3];
           return view('itemList', compact('code', 'name', 'isPR', 'isSoldout','errorMessage'));
       } else {
           $inputedCondition = Session::get('inputedCondition');
           $code             = $inputedCondition[0];
           $name             = $inputedCondition[1];
           $isPR             = $inputedCondition[2];
           $isSoldout        = $inputedCondition[3];
           $item             = Search::itemSearch($code, $name, $isPR, $isSoldout);
         return view('itemList', compact('code', 'name', 'isPR', 'isSoldout', 'item', 'errorMessage'));
       }
    }
    /**
     * 商品を検索します。
     * @param  Request $request 検索欄に入力した値
     * @return 一覧画面
     */
    public function search(Request $request) {
    	$code      = $request->input('code');
    	$name      = $request->input('name');
    	$isPR      = $request->input('isPR');
    	$isSoldout = $request->input('isSoldout');
    	$item      = Search::itemSearch($code, $name, $isPR, $isSoldout);
    	if (count($item) === 0) {
    		$errorMessage = "検索結果はありません。";
    	}
        Session::put('searchResult', $item);
        $inputedCondition[0] = $code;
        $inputedCondition[1] = $name;
        $inputedCondition[2] = $isPR;
        $inputedCondition[3] = $isSoldout;
        Session::put('inputedCondition', $inputedCondition);
    	  return view('itemList', compact('code', 'name', 'isPR', 'isSoldout', 'errorMessage', 'item'));
    }
    /**
     * 選択した商品の編集画面に遷移します。
     * @param  Request $request 商品番号
     * @return 正常時...編集画面 エラー時...一覧画面
     */
    public function edit(Request $request) {
    	$code      = $request->input('editCode');
    	$item      = SearchByCode::searchByCode($code);
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
    	  $name      = $item[0]->ITEM_NM;
    	  $unitPrice = $item[0]->UNIT_PRICE;
    	  $count     = $item[0]->STOCK_COUNT;
    	  $isPR      = $item[0]->IS_PR;
    	  $time      = $item[0]->RECORD_DATE;
    	  return view('itemEdit', compact('code', 'name', 'unitPrice', 'count', 'isPR', 'time'));
      }
    }
}
