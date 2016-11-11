<?php

namespace App\Dao;

use DB;

class PracticeDao {

	//test
    public function test() {
    	return 'test facade';
    }
    
    /**
     * ���i�w��
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
     * ���i���������\�b�h
     */
    public function findNameCount($findName) {
		return DB::table('practice')
						->where('ITEM_NM', $findName)
						->count();
    }
    
    /**
     * ���i�������\�b�h
     */
    public function searchItems($searchCondition) {
    	$whereArr = [
    					['ITEM_NO', 'like', $searchCondition['code'] . '%'],
    					['ITEM_NM', 'like', '%' . $searchCondition['name'] . '%']
    				];
    	//Âæ¡ä»¶è¿½å��
		if(!empty($searchCondition['isPR']) && $searchCondition['isPR'] == 1) $whereArr[] = ['IS_PR', 1];
		if(!empty($searchCondition['isSoldout']) && $searchCondition['isSoldout'] == 1) $whereArr[] = ['STOCK_COUNT', 0];
		
    	return DB::table('practice')
    			->where($whereArr)
    			->get();
    }

    /**
     * ���i���擾���\�b�h
     */
    public function getItemInfo($code) {
        return DB::table('practice')
    		->where('ITEM_NO', $code)
    		->first();
    }

    /**
     *�X�V�����擾���\�b�h
     */
    public function getDateModified($code) {
    	return DB::table('practice')
    		->where('ITEM_NO', $code)
    		->value('RECORD_DATE');
    }

    /**
     * ���i���擾���\�b�h
     */
    public function getItemName($code) {
    	return DB::table('practice')
    		->where('ITEM_NO', $code)
    		->value('ITEM_NM');
    }

    /**
     * �X�V�������\�b�h
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
     * ���i�폜���\�b�h
     */
    public function deleteItemData($code) {
        return DB::table('practice')
            ->where('ITEM_NO', $code)
            ->delete();
    }

    /**
     * ���i�����݂��邩�`�F�b�N���郁�\�b�h
     */
    public function presenceItem($code) {
        return DB::table('practice')
            ->where('ITEM_NO', $code)
            ->count();
    }
}
