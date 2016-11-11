    <html xml:lang="ja" lang="ja">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!--
    <link type="text/css" rel="stylesheet" href="exValidation/css/style.css" />
    -->
    <link type="text/css" rel="stylesheet" href="exValidation/css/exvalidation.css" />
    <title>商品変更</title>
    </head>
    <body>
    <h1>商品変更</h1>
    @if (isset($errorMessage))
    <font color="red">{{ $errorMessage }}</font><br>
    @endif
    > <a href="itemList">一覧</a><br><br>

    <form action="update" method="POST">
    <table cellspacing="1" cellpadding="8" border="0" bgcolor="#999999">
      <tbody><tr>
        <th width="100" bgcolor="#EBEBEB">商品コード</th>
        <td width="250" bgcolor="#FFFFFF"><input type="text" id="code" name="code" readonly="readonly" value="{{ $code }}"></td>
      </td></tr>
      <tr>
        <th width="100" bgcolor="#EBEBEB">商品名<sup><font color="#FF0000">*</font></sup></th>

        <td width="250" bgcolor="#FFFFFF"><input type="text" id="name" name="name" value="{{ $name }}"></td>
      </td></tr>
      <tr>
        <th width="100" bgcolor="#EBEBEB">金額<sup><font color="#FF0000">*</font></sup></th>
        <td width="250" bgcolor="#FFFFFF"><input type="text" id="unitPrice" name="unitPrice" value="{{ $unitPrice }}"></td>
      </td></tr>
      <tr>
        <th width="100" bgcolor="#EBEBEB">数量<sup><font color="#FF0000">*</font></sup></th>

        <td width="250" bgcolor="#FFFFFF"><input type="text" id="count" name="count" value="{{ $count }}"></td>
      </td></tr>
      <tr>
        <th width="100" bgcolor="#EBEBEB">商品画像</th>
        <td width="250" bgcolor="#FFFFFF"><input type="file" id="image" name="image"></td>
      </td></tr>
      <tr>
        <th bgcolor="#EBEBEB">おすすめ商品</th>
      	@if ($isPR == 1)
        <td bgcolor="#FFFFFF"><input type="checkbox" id="isPR" name="isPR" value="1" checked="checked">おすすめ商品棚に並べる</td>
        @else
        <td bgcolor="#FFFFFF">
        <input type="hidden" id="isPR" name="isPR" value="0">
        <input type="checkbox" id="isPR" name="isPR" value="1">おすすめ商品棚に並べる</td>
        @endif
      </td></tr>
    </tbody></table><br>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="time"   value="{{ $time }}">
    <input type="submit" value="変更する" onclick="if(confirm('商品情報を更新しますか？')){return true;}else{return false;}">
    </form>

    <br>
    <font color="#FF0000">*</font>は必須項目

    </body>
    <Script type="text/javascript"
      src="exValidation/jquery-validation-1.9.0/jquery.min.js"></script>
    <script type="text/javascript"
      src="exValidation/jquery-validation-1.9.0/jquery.easing.js"></script>
    <script type="text/javascript"
      src="exValidation/jquery-validation-1.9.0/JQselectable.js"></script>
    <script type="text/javascript"
      src="exValidation/jquery-validation-1.9.0/exvalidation.js"></script>
    <script type="text/javascript"
      src="exValidation/jquery-validation-1.9.0/exchecker-ja.js"></script>
    <script type="text/javascript">
       var validation = $("form")
        .exValidation({
         rules: {
          name: "chkrequired chkmax200",
          unitPrice: "chkrequired chknumonly chkmin1 chknum1000",
          count: "chkrequired chknumonly chkmin1 chknum100"
         },
         stepValidation: true
        });
       </SCRIPT>
       
    </html>
