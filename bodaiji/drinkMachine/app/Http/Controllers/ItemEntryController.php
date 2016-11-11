<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Add;
use Illuminate\Http\Request;

class ItemEntryController extends Controller {

	/**
	* 初期表示
	*/
	public function getIndex() {
	$name         = "";
	$count        = "";
	$unitPrice    = "";
	$isPR         = "";
	$errorMessage = "";
		return view('itemEntry', compact('name', 'count', 'unitPrice', 'isPR', 'errorMessage'));
	}

	/**
	* 登録ボタン押下時
	*/
	public function add(Request $request) {
		$name          = $request->input('name');
		$unitPrice     = $request->input('unitPrice');
		$count         = $request->input('count');
		$isPR          = $request->input('isPR');
		$sameNameCount = DB::table('emp')->where('ITEM_NM', $name)->count('ITEM_NM');
		if ($sameNameCount !== 0){
			$errorMessage = "入力した商品名は既に使用されています。";
			return view('itemEntry', compact('name', 'unitPrice', 'count', 'isPR', 'errorMessage'));
		} else {
			$data['ITEM_NM']      = $request->input('name');
			$data['UNIT_PRICE']   = $request->input('unitPrice');
			$data['STOCK_COUNT']  = $request->input('count');
			$data['IS_PR']        = $request->input('isPR');
			Add::insertItem($data);
			$code      = "";
			$name      = "";
			$isSoldout = "";
			$isPR      = "";
			return redirect()->action('ItemListController@getIndex');
		}
	}
}
