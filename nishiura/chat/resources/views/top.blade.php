@extends('layouts.default')

@section('jsResources')
<script src="js/top.js"></script>
@stop

@section('title', 'ちゃったー トップページ')
@section('pageTitle', 'ちゃったートップページ')

@section('content')
  <form action="login" method="post">
    <input type="hidden" value="{{csrf_token()}}" id="_token" name="_token" />
    <div class="row">
      <p class="text-center">ログイン情報</p>
      <p class="text-center">ID：<input type="text" id="loginId" name="loginId" /></p>
      <p class="text-center">PASSWORD：<input type="text" id="loginPassword" name="loginPassword" /></p>
    </div>
    <div class="row">
      <p class="text-center">
        <button type="input" class="btn btn-default">ログイン</button>
      </p>
      <p class="text-center">
        <label style="color: #FF4040;">{{$errors->first('loginFailMessage')}}</label>
      </p>
    </div>
  </form>
  <div class="row">
    <form action="userCreate" method="post">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="col-xs-6 col-md-4"></div>
      <div class="col-xs-6 col-md-4"></div>
      <div class="col-xs-6 col-md-4"><input type="submit" class="btn btn-primary" value="ユーザー新規登録" /></div>
    </form>
  </div>
  <div id="hiddenFields">
    <!-- ユーザー登録成功メッセージ -->
    <input type="hidden" id="registSuccessMessage" name="registSuccessMessage" value="{{$resultMessage or ''}}"/>
  </div>
@stop
