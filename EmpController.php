<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Employee;
use App\Models\User;

class EmpController extends Controller
{
    
    //詳細ボタンを押されたら処理を行う
    public function e_detail(Request $req){
       

        $id =$req ->id;
        $books = Book::find($id);
        $empId = $req->session()->get('empId',0);//セッション取得
        $comments = Comment::all();  

        $input = $req -> isbn;
        if(strlen($input)>=13){
            $api = $input;
            $base_url="https://ndlsearch.ndl.go.jp/thumbnail/";
            $url=$base_url.$api.'.jpg';
            $data = [
                'books' => $books,
                'comments' =>$comments,
                'empId' => $empId,
                'url' => $url,
                'api' => $api
                ];
            return  view('emp.e_detail',$data);
            
        }else{
        $input = '978' .$input;
    
        //奇数、偶数の計算　10−1の数字まで繰り返す
        $oddSum = 0;
        $evenSum = 0;
    
        for ($i = 0; $i < strlen($input)-1; $i++) {
            $number = (int) $input[$i];
            if (($i + 1) % 2 == 1) { // 奇数番目（1-based index）
                $oddSum += $number;
            } else { // 偶数番目
                $evenSum += $number;
            }
        }
    
        //奇数は１倍。偶数は３倍。
        $evenSum_mu = $evenSum * 3; 
        
        //足して、１桁目を取り出す 10-値をする
        $one_place = ($oddSum + $evenSum_mu) %10;
        
        $newDigit = (10 - $one_place) % 10;
        
        $length = strlen($input);
        $input[$length-1]=$newDigit;
    
        //画像取得
        $api = $input;
        $base_url="https://ndlsearch.ndl.go.jp/thumbnail/";
        $url=$base_url.$api.'.jpg';
    
        $data = [
            'books' => $books,
            'comments' =>$comments,
            'empId' => $empId,
            'url' => $url,
            'api' => $api
            
           
            ];
        return  view('emp.e_detail',$data);
    }
}


public function e_time(Request $req){
       

    $id =$req ->bookId;
    $books = Book::find($id);
    $empId = $req->session()->get('empId',0);//セッション取得
    $comments = Comment::orderBy('created_at','desc')->get();  

    $url = $req -> url;

    $data = [
    'books' => $books,
    'comments' =>$comments,
    'empId' => $empId,
    'url' => $url
    
   
    ];
return  view('emp.e_time',$data);
}


public function e_sort(Request $req){
   

    $id =$req ->bookId;
    $books = Book::find($id);
    $empId = $req->session()->get('empId',0);//セッション取得
    $comments = Comment::orderBy('view','desc')->get();  

    $url = $req -> url;

    $data = [
    'books' => $books,
    'comments' =>$comments,
    'empId' => $empId,
    'url' => $url
    
   
    ];
return  view('emp.e_sort',$data);
}

        
    

    public function e_edit(Request $req)
    {
        $comment = Comment::find($req -> commentId);

        $data = ['comment' => $comment  ];
        
        return view('emp.e_edit',$data);


    }

    public function e_earse(Request $req)
    {
        $comment = Comment::find($req -> commentId);

        $data = ['comment' => $comment  ];
        
        return view('emp.e_earse', $data);
    }


    

    
    
    public function e_create(Request $req){
        $e_id = $req->session()->get('empId',0);

        $bookid = $req->bookId;

        $data = ['id' => $e_id,
                'bookId'=>$bookid];
        return view('emp.e_create',$data);
    
    }


    

    public function e_entry(Request $req){
        
        $comment = new Comment();

        $comment->emp_id = $req -> id;
        $comment->comment = $req -> comment;
        $comment->view = $req->view;
        $comment->book_id = $req->bookId;

        $comment->save();

        $data=[
            'emp_id'=>$req->id,
            'comment' => $req -> comment,
            'view' => $req->view,
            
        ];

        return view('emp.e_entry',$data);
    }



    public function e_update(Request $req){
        
        $comment = Comment::find($req->commentId);
        $comment->view = $req->view;
        $comment->comment = $req->comment;

        $comment -> save();

    $data = [
        'emp_id' => $req->emp_id,
        'view' => $req->view,
        'comment' => $req->comment];
        return view('emp.e_update',$data);

    }



    public function e_delete(Request $req){

        $comment = Comment::find($req->commentId);
        $comment->view = $req->view;
        $comment->comment = $req->comment;

        $comment -> delete();

    $data = [
        'emp_id' => $req->emp_id,
        'view' => $req->view,
        'comment' => $req->comment];

        return view('emp.e_delete',$data);
         
    }



}