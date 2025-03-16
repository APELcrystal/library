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


    <h1>以下の情報を登録しました</h1>


    <div class="form-container">
    <table class="table">
        <tr>
        <th>社員ID</th>
        <th>評価</th>
        <th>レビュー</th>
        </tr>

        <tr>
        <td>{{$emp_id}}</td>
        <td>{{$view}}</td>
        <td>{{$comment}}</td>
        </tr>
    </table>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>