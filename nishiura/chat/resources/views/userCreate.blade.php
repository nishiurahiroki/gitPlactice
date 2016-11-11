@extends('layouts.default')

@section('title', 'ユーザー新規作成')
@section('pageTitle', 'ユーザー新規作成')

@section('jsResources')
<script src="js/userCreate.js"></script>
@stop

@section('content')
<div class="row">
  <p class="text-center">ユーザー新規登録ページ</p>
  @if(0 < count($errors))
    @foreach($errors->all() as $error)
      <p class="text-center"><label style="color: #FF4040;">{{$error}}</label></p>
    @endforeach
  @endif
</div>
<form action="userRegist" method="post">
  <div class="form-group">
    <label>ID</label>
    <input class="form-control" value="{{ old('userId') }}" onBlur="validateExistsUserError(this)" type="text" id="userId" name="userId" />
    <span id="id_errorMessage" style="color: #FF4040;"></span>
  </div>
  <div class="form-group">
    <label>パスワード</label>
    <input class="form-control" value="{{ old('userPassword') }}" type="password" id="userPassword" name="userPassword" />
    <span id="password_errorMessage" style="color: #FF4040;"></span>
  </div>
  <div class="form-group">
    <label>名前</label>
    <input class="form-control" value="{{ old('userName') }}" type="text" id="userName" name="userName" />
  </div>
  <div class="form-group">
    <label>ユーザーアイコン</label>
    <input class="form-control" type="file" id="userIconFile" name="userIconFile" />
  </div>
  <div class="form-group">
    <button type="submit" id="registButton" class="btn btn-default">登録</button>
  </div>
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
</form>
@stop
