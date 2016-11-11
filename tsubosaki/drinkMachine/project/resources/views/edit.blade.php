@extends('common.layout')
@include('common.header')

@section('content')
<h1>商品変更</h1>
@if (!empty($mes))
<br /><font style="color: #F00; font-weight: bold;">
{{ $mes }}
</font><br /><br />
@endif
> <a href="<?php echo url('/'); ?>/list">一覧</a><br><br>

<form action="{{ action('EditController@postUpdateItem') }}" method="post">

<table cellspacing="1" cellpadding="8" border="0" bgcolor="#999999">
    <tbody>
        <tr>
            <th width="100" bgcolor="#EBEBEB">商品コード</th>
            <td width="250" bgcolor="#FFFFFF"><input type="text" id="code" name="code" readonly="readonly" value="{{ $editItemInfo->ITEM_NO }}"></td>  
            </td></tr>  
            <tr>  
            <th width="100" bgcolor="#EBEBEB">商品名<sup><font color="#FF0000">*</font></sup></th>  

            <td width="250" bgcolor="#FFFFFF"><input type="text" id="name" name="name" value="{{ $editItemInfo->ITEM_NM }}"></td>  
            </td></tr>  
            <tr>  
            <th width="100" bgcolor="#EBEBEB">金額<sup><font color="#FF0000">*</font></sup></th>  
            <td width="250" bgcolor="#FFFFFF"><input type="text" id="unitPrice" name="unitPrice" value="{{ $editItemInfo->UNIT_PRICE }}"></td>  
            </td></tr>  
            <tr>  
            <th width="100" bgcolor="#EBEBEB">数量<sup><font color="#FF0000">*</font></sup></th>  

            <td width="250" bgcolor="#FFFFFF"><input type="text" id="count" name="count" value="{{ $editItemInfo->STOCK_COUNT }}"></td>  
            </td>
        </tr>
        <tr>
            <th width="100" bgcolor="#EBEBEB">商品画像</th>  
            <td width="250" bgcolor="#FFFFFF"><input type="file" id="image" name="image"></td>  
            </td></tr>  
            <tr>  
            <th bgcolor="#EBEBEB">おすすめ商品</th>  

            <td bgcolor="#FFFFFF"><label><input type="checkbox" id="isPR" name="isPR" value="1"
            <?php if(!empty($editItemInfo->IS_PR) && $editItemInfo->IS_PR == 1) echo " checked"; ?> />おすすめ商品棚に並べる</label></td>  
            </td>
        </tr>
    </tbody>
</table>

<br>
<input type="submit" value="変更する">
</form>

<br>
<font color="#FF0000">*</font>は必須項目
@endsection

@section('addJs')
<script type="text/javascript" src="{{ asset('exValidation/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('exValidation/jquery.easing.js') }}"></script>
<script type="text/javascript" src="{{ asset('exValidation/jQselectable.js') }}"></script>
<script type="text/javascript" src="{{ asset('exValidation/exvalidation.js') }}"></script>
<script type="text/javascript" src="{{ asset('exValidation/exchecker-ja.js') }}"></script>
<script type="text/javascript">
var validation = $("form")
.exValidation({
    rules: {
        name: "chkrequired chkmax200",
        unitPrice: "chkrequired chknumonly chkmin1 chknum1000",
        count: "chkrequired chknumonly chkmin1 chknum100",
    },
    stepValidation: true
});
</script>
@endsection

@include('common.footer')
