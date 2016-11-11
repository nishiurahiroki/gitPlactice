<?php

namespace App\Dao;

use DB;

class PracticeDao {

	//test
    public function test() {
    	return 'test facade';
    }
    
    /**
     * 商品購入
     */
    public function addItem($addItemArr) {
    	if(empty($addItemArr['isPR']) || $addItemArr['isPR'] != 1) $addItemArr['isPR'] = 0;
    	return DB::table('practice')->insert(
			[
				'ITEM_NM'     => $addItemArr['name'],
				'UNIT_PRICE'  => $addItemArr['unitPrice'],
				'STOCK_COUNT' => $addItemArr['count'],
				'IS_PR'       => $addItemArr['isPR']
			]
		);
    }
    
    /**
     * 商品名検索メソッド
     */
    public function findNameCount($findName) {
		return DB::table('practice')
						->where('ITEM_NM', $findName)
						->count();
    }
    
    /**
     * 商品検索メソッド
     */
    public function searchItems($searchCondition) {
    	$whereArr = [
    					['ITEM_NO', 'like', $searchCondition['code'] . '%'],
    					['ITEM_NM', 'like', '%' . $searchCondition['name'] . '%']
    				];
    	//ﾃつ湘ｦﾂ敖｡ﾃ､ﾂｻﾂｶﾃｨﾂｿﾂｽﾃ･ﾅﾂ
		if(!empty($searchCondition['isPR']) && $searchCondition['isPR'] == 1) $whereArr[] = ['IS_PR', 1];
		if(!empty($searchCondition['isSoldout']) && $searchCondition['isSoldout'] == 1) $whereArr[] = ['STOCK_COUNT', 0];
		
    	return DB::table('practice')
    			->where($whereArr)
    			->get();
    }

    /**
     * 商品情報取得メソッド
     */
    public function getItemInfo($code) {
        return DB::table('practice')
    		->where('ITEM_NO', $code)
    		->first();
    }

    /**
     *更新日時取得メソッド
     */
    public function getDateModified($code) {
    	return DB::table('practice')
    		->where('ITEM_NO', $code)
    		->value('RECORD_DATE');
    }

    /**
     * 商品名取得メソッド
     */
    public function getItemName($code) {
    	return DB::table('practice')
    		->where('ITEM_NO', $code)
    		->value('ITEM_NM');
    }

    /**
     * 更新処理メソッド
     */
    public function updateItemData($updateItemArr) {
        DB::table('practice')
        ->where('ITEM_NO', $updateItemArr['code'])
        ->update([
                'ITEM_NM'     => $updateItemArr['name'],
                'UNIT_PRICE'  => $updateItemArr['unitPrice'],
                'STOCK_COUNT' => $updateItemArr['count'],
                'IS_PR'       => $updateItemArr['isPR']
            ]);
    }

    /**
     * 商品削除メソッド
     */
    public function deleteItemData($code) {
        return DB::table('practice')
            ->where('ITEM_NO', $code)
            ->delete();
    }

    /**
     * 商品が存在するかチェックするメソッド
     */
    public function presenceItem($code) {
        return DB::table('practice')
            ->where('ITEM_NO', $code)
            ->count();
    }
}
