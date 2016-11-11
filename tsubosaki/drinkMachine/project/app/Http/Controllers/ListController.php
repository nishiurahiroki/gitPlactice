<?php

namespace App\Http\Controllers;

use Dao;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class ListController extends Controller
{
    /**
     * 商品検索メソッド
     */
    public function postFindItem(Request $req) {
		//フォームの値を配列で受け取る
		$searchConditionData = $req->all();
		
		//フォームの値で検索、検索結果の保持
		Session::put('searchResultItems', Dao::searchItems($searchConditionData));

		$serchErrorMes = null;
		//検索結果がなければエラー
		if(Session::has('searchResultItems') && empty(Session::get('searchResultItems'))) {
			$serchErrorMes = '検索条件に一致するものがありませんでした。';
		}
		
		//検索ページに遷移
		return view('/list', ['mes' => $serchErrorMes, 'searchConditionData' => $searchConditionData]);
    }

    /**
     * 商品削除メソッド
     */
    public function postDeleteItem(Request $req) {
        $deleteCode = $req->input('code');

        //商品が存在しなかったらエラー
        if(Dao::presenceItem($deleteCode) === 0) {
            return view('/list', ['mes' => '商品が存在しないので削除できませんでした。']);
        }

        //商品の削除に失敗したらエラー
        if(Dao::deleteItemData($deleteCode) === 0) {
            return view('/list', ['mes' => '商品の削除に失敗しました']);
        }

        return view('/list');
    }
}

