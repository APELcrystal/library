<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/test.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/Top.css')}}">
</head>
<body>

<header>
    <h2 id="head_h"><a href="/display" class="header-link">書籍管理システム</a></h2>
    <ul>
    <li><a href="/index" class="logout">ログアウト</a></li>
    </ul>
</header>

<br>

    <h1>以下の情報を削除しました</h1>
    <div style="width:1000px;text-align:center;margin: 0 auto;">

    <div class="form-container">

    <table class="table">
    <tr>
        <th style="font-size:20px">社員ID</th>
        <th style="font-size:20px">評価</th>
        <th style="font-size:20px">レビュー</th>
        </tr>

        <tr>
        <td style="font-size:20px">{{$emp_id}}</td>
        <td style="font-size:20px">{{$view}}</td>
        <td style="font-size:20px">{{$comment}}</td>
    </tr>
    </table><br>
    </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>


