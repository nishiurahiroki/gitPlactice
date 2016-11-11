@extends('common.layout')
@include('common.header')

@section('content')

<h1>商品一覧</h1>
@if (!empty($mes))
<br /><font style="color: #F00; font-weight: bold;">
{{ $mes }}
</font><br /><br />
@endif

> <a href="<?php echo url('/'); ?>/add">追加</a><br>
> <a href="<?php echo url('/'); ?>/cart">購入者画面をチェックする</a><br>
<br>

<form method="post" action="{{ action('ListController@postFindItem') }}">
	<table cellspacing="1" cellpadding="8" border="0" bgcolor="#999999">
	<tbody>
		<tr>
			<th width="100" bgcolor="#EBEBEB">商品コード</th>
			<td width="250" bgcolor="#FFFFFF"><input type="text" name="code" value="<?php if(isset($searchConditionData['code'])) echo $searchConditionData['code']; ?>"> </td>
		</tr>
		<tr>
			<th width="100" bgcolor="#EBEBEB">商品名<sup><font color="#FF0000">*</font></sup></th>
			<td width="250" bgcolor="#FFFFFF"><input type="text" name="name" value="<?php if(isset($searchConditionData['name'])) echo $searchConditionData['name']; ?>"> </td>
		</tr>
		<tr>
			<th bgcolor="#EBEBEB">他、検索条件</th>
			<td bgcolor="#FFFFFF">
				<label><input type="checkbox" name="isPR" value="1"<?php if(isset($searchConditionData['isPR'])) echo " checked"; ?> />おすすめ商品</label>
				<label><input type="checkbox" name="isSoldout" value="1"<?php if(isset($searchConditionData['isSoldout'])) echo "checked"; ?> />売切れ商品</label>
			</td>
		</tr>
	</tbody>
	</table>

<br>
<div>
  <input type="submit" value="検索">
</div>

</form>

<form id="editForm" method="post" action="{{ action('EditController@postEditItem') }}"></form>
<form id="deleteForm" method="post" action="{{ action('ListController@postDeleteItem') }}"></form>

<br>
<div>
  <input type="submit" value="一括登録">
  <input type="submit" value="一覧の情報をCSV出力">
</div>
</div>

<br>
<br>
<table cellspacing="1" cellpadding="8" border="0" bgcolor="#999999">
<tbody>
	<tr bgcolor="#EBEBEB">
		<th> </th>
		<th> </th>
		<th> </th>
		<th align="center">商品コード</th>
		<th align="center">商品名</th>
		<th align="center">金額</th>
		<th align="center">数量</th>
	</tr>

	@if(!empty(Session::get('searchResultItems')))
		@foreach(Session::get('searchResultItems') as $sRItem)
			<tr bgcolor="#FFFFFF">
				<td><a href="detail.html">詳細</a></td>
				<td><a href="#" onclick="editSubmit({{ $sRItem->ITEM_NO }});return false;">編集</a></td>  
				<td><a href="#" onclick="deleteSubmit({{ $sRItem->ITEM_NO }});return false;">削除</a></td>  
				<td>{{ $sRItem->ITEM_NO }}</td>  
				<td>{{ $sRItem->ITEM_NM}}</td>  
				<td>{{ $sRItem->UNIT_PRICE }}</td>  
				<td>{{ $sRItem->STOCK_COUNT }}</td>  
			</tr>
		@endforeach
  	@endif
</tbody>
</table>
@endsection

@section('addJs')
<script type="text/javascript">
function editSubmit(code) {
	if(confirm("商品の編集をしますか？")) {
		var editInput = document.createElement('input');
		editInput.type = "hidden";
		editInput.name = "code";
		editInput.value = code;
		var editFormElem = document.getElementById("editForm");
		editFormElem.append(editInput);
		editFormElem.submit();
	}
}

function deleteSubmit(code) {
	if(confirm("商品を削除しますか？")) {
		var delInput = document.createElement('input');
		delInput.type = "hidden";
		delInput.name = "code";
		delInput.value = code;
		var deleteFormElem = document.getElementById("deleteForm");
		deleteFormElem.append(delInput);
		deleteFormElem.submit();
	}
}
</script>
@endsection

@include('common.footer')
