<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/test.css')}}">
    <link rel="stylesheet" href="{{asset('css/Top.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        .no-click {
        pointer-events: none;
    }
    .center-form{
            border: 15px #000;
            width: 800px;
            margin:10px auto;
            padding-bottom:20px;
        }


    </style>

  </head>

<body>

<header>
    <h2 id="head_h"><a href="/display" class="header-link">書籍管理システム</a></h2>
    <ul>
    <li><a href="/index" class="logout">ログアウト</a></li>
    </ul>
</header>

<br>
<h1>レビュー登録</h1>
<br>

<div class="form-container">

    <form action="e_entry" method="post">
    @csrf
    
   
    
    <input type="hidden" name="bookId" value="{{$bookId}}">
    <div class="mb-3">
    <label for="id">社員ID</label>
    <input type="number" class="form-control-plaintext no-click" name="id" id="id" value="{{$id}}" readonly>

    
    </div>

    <div class="review">
    評価<br>
    <div class="stars">
    <span>
      <input id="view01" type="radio" name="view" value="5"><label for="view01">★</label>
      <input id="view02" type="radio" name="view" value="4"><label for="view02">★</label>
      <input id="view03" type="radio" name="view" value="3"><label for="view03">★</label>
      <input id="view04" type="radio" name="view" value="2"><label for="view04">★</label>
      <input id="view05" type="radio" name="view" value="1"><label for="view05">★</label>
    </span>
    </div>
    </div>

   
    <div class="mb-3">
    <label for="comment">レビュー</label>
    <textarea name="comment" id="" rows="3" class="form-control" style="width: 500px; border-radius:4px; height: 100px" style=""required></textarea>
    </div>
    <input type="submit" value="登録"  >

    </form><br>
    </div>
   


    <!-- CSSでスタイリング -->
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
