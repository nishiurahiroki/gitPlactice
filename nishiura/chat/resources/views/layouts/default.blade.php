<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  @yield('jsResources')
  @yield('cssResources')
  <title>@yield('title', 'ちゃったー')</title>
</head>
<div class="container">
  <div class="row">
    <div class="col-md-5">
      @yield('pageTitle', 'トップページ')
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
    <div class="col-md-1">
      <form action="top" method="get">
        <div class="form-group">
          <button type="submit" class="btn btn-primary">トップページに戻る</button>
        </div>
      </form>
    </div>
  </div>
  @yield('content')
</div>
</html>
