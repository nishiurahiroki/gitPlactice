/**
 * 編集ボタン押下時
 * @param  itemCd 商品番号
 * @return true..ItemListController@edit false..一覧画面
 */
	function editConfirm(itemCd) {
		if (confirm('商品情報を編集しますか？') == false) {
		} else {
   		var code   = document.getElementById('editCode');
    	code.value = itemCd;
    	document.getElementById('editForm').submit();
    }
  }
/**
 * 削除ボタン押下時
 * @param  itemCd 商品番号
 * @return true..ItemDeleteController@delete false..一覧画面
 */
	function deleteConfirm(itemCd) {
		if (confirm('商品情報を削除しますか？') == false) {
		} else {
			var code   = document.getElementById('deleteCode');
			code.value = itemCd;
			document.getElementById('deleteForm').submit();
		}
	}
/**
 * 詳細ボタン押下時
 * @param  itemCd 商品番号
 * @return true..ItemViewController@view false..一覧画面
 */
	function viewConfirm(itemCd) {
		if (confirm('商品の詳細情報を閲覧しますか？') == false) {
		} else {
			var code   = document.getElementById('viewCode');
			code.value = itemCd;
			document.getElementById('viewForm').submit();
		}
	}
