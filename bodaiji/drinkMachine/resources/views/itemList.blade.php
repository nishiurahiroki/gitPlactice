    <html xml:lang="ja" lang="ja">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>商品一覧</title>
    </head>
    <body>
    <h1>商品一覧</h1>
    @if (isset($errorMessage))
      <font color="red">{{$errorMessage}}</font><br>
    @endif
    > <a href="itemEntry">追加</a><br>
    > <a href="/drinkMachine/public">購入者画面をチェックする</a><br>
    <br>
    <script type="text/javascript" src="js/functions.js"></script>
<!-----------検索フォーム------------->
<form action="search" method="POST">
    <table cellspacing="1" cellpadding="8" border="0" bgcolor="#999999">
      <tbody><tr>
        <th width="100" bgcolor="#EBEBEB">商品コード</th>
        <td width="250" bgcolor="#FFFFFF"><input type="text" name="code" value="{{$code}}"> </td>
      </tr>
      <tr>
        <th width="100" bgcolor="#EBEBEB">商品名</th>

        <td width="250" bgcolor="#FFFFFF"><input type="text" name="name" value="{{$name}}"> </td>
      </tr>
      <tr>
        <th bgcolor="#EBEBEB">他、検索条件</th>
        <td bgcolor="#FFFFFF">
        @if ($isPR == 1)
          <input type="checkbox" name="isPR" value="1" checked="checked">おすすめ商品
        @else
          <input type="hidden" name="isPR" value="0">
          <input type="checkbox" name="isPR" value="1">おすすめ商品
        @endif
        @if ($isSoldout == 1)
          <input type="checkbox" name="isSoldout" value="1" checked="checked">売切れ商品
        @else
          <input type="hidden" name="isSoldout" value="0">
          <input type="checkbox" name="isSoldout" value="1">売切れ商品
        @endif
        </td>
      </tr>
    </tbody></table>
    <br>
    <div border="0" bgcolor="#999999">
    <div>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="submit" value="検索">
    </div>
</form>
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
<!------項目---------------->
	  <tr bgcolor="#EBEBEB">
        <th> </th>
        <th> </th>
        <th> </th>
        <th align="center">商品コード</th>
        <th align="center">商品名</th>
        <th align="center">金額</th>
        <th align="center">数量</th>
      </tr>
<!------検索結果------------>
  @if (isset($item))
	 @foreach ($item as $result)
     <tr bgcolor="#FFFFFF">
        <td><a href="javascript:viewConfirm({{ $result->ITEM_NO }});">詳細</a></td>
        <td><a href="javascript:editConfirm({{ $result->ITEM_NO }});">編集</a></td>
        <td><a href="javascript:deleteConfirm({{ $result->ITEM_NO }});">削除</a></td>

        <td>{{ $result->ITEM_NO }}</td>
        <td>{{ $result->ITEM_NM }}</td>
        <td>{{ $result->UNIT_PRICE }}</td>
        <td>{{ $result->STOCK_COUNT }}</td>
      </tr>
      @endforeach
  @endif
    </tbody></table>
    </body>
<!-------formタグ--------------------->
    <form action="edit" method="GET" id="editForm">
     <input type="hidden" id="editCode" name="editCode" value="">
    </form>
    <form action="view" method="GET" id="viewForm">
     <input type="hidden" id="viewCode" name="viewCode" value="">
    </form>
    <form action="delete" method="GET" id="deleteForm">
     <input type="hidden" id="deleteCode" name="deleteCode" value="">
    </form>
    </html>
