<?php

namespace App\Http\Controllers;

use Dao;
use Illuminate\Http\Request;

use App\Http\Requests;

class AddController extends Controller
{
    /**
     * 商品登録メソッド
     */
    public function postIndex(Request $req) {
		//フォームの値を配列で受け取る
		$addFormData = $req->all();

		//バリデーション
		$this->addValidation($req);
		
		//DBの中を商品名で検索して何件あるか取得する
		$overlapCount = Dao::findNameCount($addFormData['name']);
		
		//重複チェック
		if($overlapCount !== 0) {
			//すでにDBに名前が存在したら
			return view('/add', ['mes' => 'その商品名は既に使用されています。', 'addItemArr' => $addFormData]);
		}
		
		//重複していなければ フォームの値をDBに登録
		$addItemCount = Dao::addItem($addFormData);
		
		if($addItemCount === 0) {
			//登録失敗で登録画面に戻る
			return view('/add', ['mes' => '商品の登録に失敗しました。', 'addItemArr' => $addFormData]);
		}
		
		//登録成功で検索ページに遷移
		return view('/list', ['mes' => null]);
    }

    /**
     * 商品登録時のバリデーション
     * 
     * @param [Request] $req
     */
    private function addValidation($req) {
		$this->validation($req, [
				'name'      => 'required',
				'unitPrice' => 'required',
				'count'     => 'required',
			]);
    }
}
