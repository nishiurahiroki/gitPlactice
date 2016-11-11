<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use SearchByCode;

class ItemViewController extends Controller
{
    public function view(Request $request) {
        $item = SearchByCode::searchByCode($request->input('viewCode'));
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
        $code      = $item[0]->ITEM_NO;
        $name      = $item[0]->ITEM_NM;
        $unitPrice = $item[0]->UNIT_PRICE;
        $count     = $item[0]->STOCK_COUNT;
        $isPR      = $item[0]->IS_PR;
        return view('itemView', compact('code', 'name', 'unitPrice', 'count', 'isPR'));
      }
    }
}
