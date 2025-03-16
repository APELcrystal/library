<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/Top.css')}}">
    <link rel="stylesheet" href="{{asset('css/test.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
<body>


<header>
    <h2 id="head_h"><a href="/display" class="header-link">書籍管理システム</a></h2>
    <ul>
    <li><a href="/index" class="logout">ログアウト</a></li>
    </ul>
</header>
<br>


    <h1>以下の情報を更新します</h1>

  
    <div class="form-container">
    <form action="/emp/e_update" method="post">
    @csrf
    <input type="hidden" name="commentId" value="{{$comment->id}}">

    <div class="mb-3">
    <label for="emp_id">社員ID</label>
    <input type="text" class="form-control" name="emp_id" value="{{ $comment->emp_id }}" readonly><br><br>
    </div>


    <div class="review">
    評価<br>
    <div class="stars">
  

    <span>
    @for ($i = 5; $i >= 1; $i--)
        <input id="view{{ $i }}" type="radio"  class="form-control" name="view" value="{{ $i }}" 
        @if ($comment->view == $i) checked @endif>
        <label for="view{{ $i }}">★</label>
    @endfor
    </span>

    </div>
    </div>

<br>
<div class="mb-3">
    <label for="comment">レビュー</label><br>
    <textarea name="comment" style="width: 500px; border-radius:4px; height: 100px">{{  $comment->comment }}</textarea><br>
    </div>

    <input type="submit" value="更新" style="font-size:18px; width:60px; height:50px; border-radius:4px;border: none;" >
    </form><br>
    </div>

  

    <style>
    
 

.stars span{
  display: flex;               /* 要素をフレックスボックスにする */
  flex-direction: row-reverse; /* 星を逆順に並べる */
  justify-content: flex-end;   /* 逆順なので、左寄せにする */
}

.stars input[type='radio']{
  display: none;               /* デフォルトのラジオボタンを非表示にする */
}

.stars label{
  color: #D2D2D2;              /* 未選択の星をグレー色に指定 */
  font-size: 30px;             /* 星の大きさを30pxに指定 */
  padding: 0 5px;              /* 左右の余白を5pxに指定 */
  cursor: pointer;             /* カーソルが上に乗ったときに指の形にする */
}

.stars label:hover,
.stars label:hover ~ label,
.stars input[type='radio']:checked ~ label{
  color: #F8C601;              /* 選択された星以降をすべて黄色にする */
}


    </style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>