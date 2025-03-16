<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/Top.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/test.css')}}">
</head>
<body>
<header>
    <h2 id="head_h"><a href="/display" class="header-link">書籍管理システム</a></h2>
    <ul>
    <li><a href="/index" class="logout">ログアウト</a></li>
    </ul>
</header>
<br>

<h1>以下の情報を削除します</h1>

<div class="form-container">


<form action="/emp/e_delete" method="post">
@csrf
<input type="hidden" name="commentId"  value="{{$comment->id}}">
<div class="mb-3">
<label for="emp_id">社員ID</label>
<input type="text"  name="emp_id" class="form-control" value="{{ $comment->emp_id }}" readonly><br>
</div>

<div class="mb-3">
<label for="view">評価</label>
<input type="text"  name="view" class="form-control" value="{{ $comment->view }}" readonly><br>
</div>

<div class="mb-3">
<label for="comment">レビュー</label><br>
<textarea name="comment" style="width: 500px; border-radius:4px; height: 100px" readonly>{{  $comment->comment }}</textarea><br>
</div>

<input type="submit" value="削除" style="font-size:18px; width:60px; height:50px; border-radius:4px;border: none;">
</form><br>

</div>

 

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</body>
</html>