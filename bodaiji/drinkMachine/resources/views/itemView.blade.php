<html xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>商品照会</title>
</head>
<body>
<h1>商品照会</h1>
> <a href="itemList">一覧</a><br><br>

<table cellspacing="1" cellpadding="8" border="0" bgcolor="#999999">
  <tbody><tr>
    <th width="100" bgcolor="#EBEBEB">商品コード</th>
    <td width="250" bgcolor="#FFFFFF">{{ $code }}</td>
  </tr>
  <tr>
    <th width="100" bgcolor="#EBEBEB">商品名</th>
    <td width="250" bgcolor="#FFFFFF">{{ $name }}</td>

  </tr>
  <tr>
    <th width="100" bgcolor="#EBEBEB">金額</th>
    <td width="250" bgcolor="#FFFFFF">{{ $unitPrice }}</td>
  </tr>
  <tr>
    <th width="100" bgcolor="#EBEBEB">数量</th>
    <td width="250" bgcolor="#FFFFFF">{{ $count }}</td>
  </tr>
  <tr>
    <th width="100" bgcolor="#EBEBEB">商品画像</th>
    <td width="250" bgcolor="#FFFFFF"><img src="./01.jpg" alt="" width="30" height="30"></td>
  </tr>
  <tr>
    <th bgcolor="#EBEBEB">おすすめ商品</th>
    <td bgcolor="#FFFFFF">
    @if($isPR ==1)
     <input type="checkbox" name="isPR" disabled="disabled" checked="checked">
    @else
     <input type="checkbox" name="isPR" disabled="disabled">
    @endif
    おすすめ商品棚に並べる</td>
  </tr>
</tbody></table>
</body>
</html>
