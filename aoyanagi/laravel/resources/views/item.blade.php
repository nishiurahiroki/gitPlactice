<html>
    
<head>
  <meta charset="UTF-8" />
  <title>商品登録画面</title>
</head>

<body>

<form method="POST" action="">

 <h1>商品登録</h1>

 <br>
 <table bgcolor="#999999" border="0" cellpadding="8" cellspacing="1">
 <tbody><tr>
 <th bgcolor="#EBEBEB" width="100">商品コード</th>
 <td bgcolor="#FFFFFF" width="250"><input type="text" name="code" value=""> </td>
 </tr>
 <tr>
 <th bgcolor="#EBEBEB" width="100">商品名<sup><font color="#FF0000">*</font></sup></th>
 <td bgcolor="#FFFFFF" width="250"><input type="text" name="name" value=""> </td>
 </tr>
 <tr>
 <th bgcolor="#EBEBEB" width="100">数量<sup><font color="#FF0000">*</font></sup></th>
 <td bgcolor="#FFFFFF" width="250"><input type="text" name="suu" value=""> </td>
 </tr>
 <tr>
 <th bgcolor="#EBEBEB" width="100">金額<sup><font color="#FF0000">*</font></sup></th>
 <td bgcolor="#FFFFFF" width="250"><input type="text" name="kin" value=""> </td>
 </tr>
 <tr>
 <th bgcolor="#EBEBEB">おすすめ商品</th>
 <td bgcolor="#FFFFFF">
 <input type="checkbox" name="isPR" value="True"{% if item.isPR %} checked{% endif %}>おすすめ商品棚に並べる</input>
 </td>
 </tr>
 </tbody></table>
 <br>

 <div border="0" bgcolor="#999999">
 <div>

 <input type="submit" name="add" value="登録">
 <input type="submit" name="del" value="削除">

 </div>

    <input type="hidden"  name="_token" value="{{ csrf_token() }}">

</form>

</body>

</html>

