<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use SearchByCode;
use Search;
use DB;
use Update;
use SearchByName;
use Carbon\Carbon;
class ItemUpdateController extends Controller
{
    public function update(Request $request) {
    	$code      = $request->input('code');
    	$name      = $request->input('name');
    	$unitPrice = $request->input('unitPrice');
    	$count     = $request->input('count');
    	$isPR      = $request->input('isPR');
    	$time      = $request->input('time');

    	$item          = SearchByCode::searchByCode($code);
      $itemName      = $item[0]->ITEM_NM;
      $countSameName = SearchByName::searchByName($name);

    	if ($this->checkDeleted($item) === 1) {
        $errorMessage = "この商品は他の方によって既に削除されています。";
      } else if ($this->checkUpdated($item, $time) === 1) {
        $errorMessage = "この商品は他の方によって既に更新されています。";
      } else if ($this->checkSameName($countSameName, $name, $item) === 1) {
        $errorMessage = "この商品名は既に登録されています。";
      }
      if ($this->checkDeleted($item) === 0 && $this->checkUpdated($item, $time) === 0 && $this->checkSameName($countSameName, $name, $item) === 0) {
         //更新処理
         DB::table('emp')->where('ITEM_NO', $code)
                         ->update([
                                   'ITEM_NM'    =>$name,
                                   'UNIT_PRICE' =>$unitPrice,
                                   'STOCK_COUNT'=>$count,
                                   'IS_PR'      =>$isPR,
                                   'RECORD_DATE'=>Carbon::now()
                                 ]);
         return redirect()->action('ItemListController@getIndex');
      } else {
        //エラー
         return view('itemEdit', compact('code', 'name', 'unitPrice', 'count', 'isPR', 'errorMessage', 'time'));
      }
}

   /**
    * 商品が削除されていないかどうか確認します。
    * @param  $item 商品データ
    * @return 異常なし...0 既に削除されている場合...1
    */
    private function checkDeleted($item) {
      if (!isset($item)) {
        return 1;
      } else {
        return 0;
      }
    }
    /**
     * 排他制御
     * @param  [type] $item [description]
     * @param  [type] $time [description]
     * @return [type]       [description]
     */
    private function checkUpdated($item, $time) {
      if($time !== $item[0]->RECORD_DATE) {
        return 1;
      } else {
        return 0;
      }
    }

    private function checkSameName($countSameName, $name, $item) {
      if ($countSameName === 0 || $name === $item[0]->ITEM_NM) {
         return 0;
    	} else {
         return 1;
      }
    }
}
