<?php

namespace App\Http\Controllers;

use Dao;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class EditController extends Controller
{
    /**
     * 編集画面に表示する情報の取得
     */
    public function postEditItem(Request $req) {
    	$editCode = $req->input('code');

        //削除済みチェック
    	if(Dao::presenceItem($editCode) === 0) {
            return view('/list', ['mes' => '削除済みの商品です。']);
        }

    	//商品情報取得
    	$editItemInfo = Dao::getItemInfo($editCode);
    	
    	//セッションに更新日時を入れる
    	Session::put('list_editRecordDate', Dao::getDateModified($editCode));
    	
    	return view('/edit', ['editItemInfo' => $editItemInfo]);
    }

    /**
     * 商品の更新処理
     *
     * @param  Request $req リクエストを受け取る
     * @return [Response]
     */
    public function postUpdateItem(Request $req) {
    	$updateItemInfo = $req->all();

        //更新失敗時の値の保持
        $editItemInfo = new \stdClass;
        $editItemInfo->ITEM_NO = $updateItemInfo['code'];
        $editItemInfo->ITEM_NM = $updateItemInfo['name'];
        $editItemInfo->UNIT_PRICE = $updateItemInfo['unitPrice'];
        $editItemInfo->STOCK_COUNT = $updateItemInfo['count'];
        //チェックボックスにチェックが入っていなかった場合
        if(empty($updateItemInfo['isPR'])) $updateItemInfo['isPR'] = 0;
        $editItemInfo->IS_PR = $updateItemInfo['isPR'];

        //更新日時取得
        $edit_updateRecordDate = Dao::getDateModified($updateItemInfo['code']);

        //削除済みエラー
        if(Dao::presenceItem($updateItemInfo['code']) === 0) {
            return view('/edit', ['mes' => '削除されたので更新できません。', 'editItemInfo' => $editItemInfo]);
        }

    	//排他制御
    	if(Session::get('list_editRecordDate') !== $edit_updateRecordDate) {
    		//もし他の人が更新していたら、新しい更新日時をセット
            Session::put('list_editRecordDate', $edit_updateRecordDate);
    		return view('/edit', ['mes' => '他の人が更新したので更新できませんでした。', 'editItemInfo' => $editItemInfo]);
    	}
    	
    	//商品名重複チェック
    	$overlapCount = Dao::findNameCount($updateItemInfo['name']);
    	if($overlapCount !== 0 && $updateItemInfo['name'] !== Dao::getItemName($updateItemInfo['code'])) {
    		//商品名がDBに存在して、それが今編集しようとしている商品の名前と違った場合
    		return view('/edit', ['mes' => 'その商品名は既に使用されているので他の名前に変えてください。', 'editItemInfo' => $editItemInfo]);
    	}
    	
    	//エラーがなければ更新処理
        Dao::updateItemData($updateItemInfo);
    	
    	//検索画面に遷移
    	return view('/list');
    }
}
