<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/test.css')}}">
    <link rel="stylesheet" href="{{asset('css/Top.css')}}">
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

    <h1>書籍詳細</h1>

    <br>


    {{--画像の表示--}}
    

    <div style="text-align: center;">
  <h2 style="display: inline-block; border-bottom: solid 2px rgb(91, 170, 215); font-size: 20px;">
    {{$books->book_name}}
  </h2>
</div>
    <div class="form-container">
    <table>
        <tr>
            <td rowspan="5" width="300px; font-size:30px;"> <img src="{{$url}}" alt="画像が見つかりませんでした" id="image" ></td>
            <td></td>
        </tr>
        <tr><td>著者名：{{$books->author_name}}</td></tr>
        <tr><td>出版社：{{$books->publisher}}</td></tr>
        <tr><td>ISBNコード：{{$books->isbn}}</td></tr>
        <tr><td></td></tr>
    </table>
    </div>
    <hr> 

    <div class="target">
    <table style="margin: 0 auto;">
        <tr>
            <th>
                <form action="/emp/e_create" method="post">
                    @csrf
                    <input type="hidden" name="bookId" value="{{$books->id}}">
                    <input type="submit" value="レビューの追加" style="width:200px; height:30px; border-radius:4px; background-color:#6f9bdd">
                </form>
            </th>
            <th style="width:100px"></th>
            <th></th>
            <th>
                <form action="/emp/e_time" method="post">
                    @csrf
                    <input type="hidden" name="bookId" value="{{$books->id}}">
                    <input type="hidden" name="url" value="{{$url}}">
                    <input type="submit" value="レビュー新しい順" style="width:150px; height:30px; border-radius:4px;">
                </form>
            </th>
            <th>
                <form action="/emp/e_sort" method="post">
                    @csrf
                    <input type="hidden" name="bookId" value="{{$books->id}}">
                    <input type="hidden" name="url" value="{{$url}}">
                    <input type="submit" value="レビュー評価の良い順" style="width:180px; height:30px; border-radius:4px;">
                </form>
            </th>
        </tr>
    </table>
</div>

<br>
<div style="text-align: center;">
  <h4 style="display: inline-block; border-bottom: solid 2px rgb(91, 170, 215); font-size: 20px;">
    レビュー　一覧
  </h4>
</div>
<br>

  
    @foreach($comments as $comment)
    <div class="target">
    @if($comment->book_id == $books->id)

    <div class="mb-3">
    <span style="font-size: 18px;">社員ID：{{$comment->emp_id}}</span><br><br>
   
    <div class="review">
    <span style="font-size: 18px;">評価</span><br>
            <div class="stars">
                <span>
                    @for ($i = 5; $i >= 1; $i--)
                        <!-- 各コメントに対してユニークなname属性を設定 -->
                        <input id="view{{ $i }}_{{ $comment->id }}" type="radio" name="view_{{ $comment->id }}" value="{{ $i }}"
                               @if ($comment->view == $i) checked @endif disabled>
                        <label for="view{{ $i }}_{{ $comment->id }}">★</label>
                    @endfor
                </span>
            </div>
    </div>
    <br>

    <div class="mb-3">
    <span style="font-size: 18px;">レビュー</span>
    <br>
    <textarea name="" style="width: 500px; border-radius:4px; height: 100px" readonly>{{$comment->comment}}</textarea>


    @if($empId == $comment->emp_id)
    <table>
    <tr><td>
        <div class="format">
    <form action="./e_edit" method="post">
        @csrf
            <input type="hidden" name="commentId" value="{{$comment->id}}">
            <input type="submit" value="更新" style="width:50px; height:30px; border-radius:4px;">
    </form></td>
    </div>
   
    <td>
    <form action="./e_earse" method="post">
        @csrf
        <input type="hidden" name="commentId" value="{{$comment->id}}">
        <input type="submit" value="削除" style="width:50px; height:30px; border-radius:4px;">
    </td>
    </form>
    </tr></table>
    
    @endif
    </div>
    </div>
    <br>
    

    @endif
    </div>
    @endforeach

  
    <style>
        
  
.stars span {
    display: flex;                /* 要素をフレックスボックスにする */
    flex-direction: row-reverse;  /* 星を逆順に並べる */
    justify-content: flex-end;    /* 逆順なので、左寄せにする */
  }
  
  .stars input[type='radio'] {
    display: none;                /* デフォルトのラジオボタンを非表示にする */
  }
  
  .stars label {
    color: #D2D2D2;               /* 未選択の星をグレー色に指定 */
    font-size: 30px;              /* 星の大きさを30pxに指定 */
    padding: 0 5px;               /* 左右の余白を5pxに指定 */
    cursor: default;              /* カーソルが上に乗ったときに指の形にしない */
  }
  
  /* ラジオボタンがチェックされている状態でも、カーソルを変更しない */
  .stars input[type='radio']:disabled + label {
    cursor: default;              /* 編集不可なのでカーソルは通常 */
  }
  
  /* 星にカーソルが乗ったときに色を変更しない */
  .stars label:hover,
  .stars label:hover ~ label {
    color: #D2D2D2;               /* ホバー時でも色を変えない */
  }
  
  /* チェックされた星の色を変える */
  .stars input[type='radio']:checked ~ label {
    color: #F8C601;               /* 選択された星を黄色に */
  }
  
  /* disabled状態でも選択済みの星を黄色に保つ */
  .stars input[type='radio']:disabled:checked ~ label {
    color: #F8C601;               /* 選択済みの星は黄色 */
  }
  
  /* 編集不可の状態でも選択された星の色を変更しないように */
  .stars input[type='radio']:disabled + label {
    color: #D2D2D2;               /* 未選択の星はグレー */
  }
  
  .target {
    display: flex;
    justify-content: center;  /* 水平方向の中央揃え */
    align-items: flex-start;   /* 縦方向の中央揃え（画面上部に寄せたい場合） */
    padding: 5px;
    box-sizing: border-box;
}

    </style>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">



</body>
</html>