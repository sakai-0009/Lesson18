<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//DB使用のために下記追加
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{


// 認証機能
public function __construct()
{
  $this->middleware('auth');
}


// 一覧表示
public function index()
 {
  //DBからデータを取りに行く記述
  //「DB::table('posts')」でpostsテーブルを指定、「->get()」でデータを取得
  $list = DB::table('posts')->get();

  // $user_name =DB::table('posts') ->select('user_name')->get();


  //$listという変数をlistsという名前でviewに渡す(view側では「$lists」という変数が使用可能)
  return view('posts.index',['lists'=>$list]);
 }


// 新規作成画面
public function createForm()
{
  $user_name = \Auth::user()->name;

  return view('posts.createForm',['user_name'=>$user_name]);
}


// 新規作成処理

//(Request $request):POST送信の場合、引数に用意した$request変数に値が渡される
public function create(Request $request)
{
//validateメソッドによるバリデーション
  $request->validate([
    'newPost' => 'required|string|max:100|regex:/[^　]+$/'
    // 'userName' =>'required|string|regex:/[^　]+$/'
  ]);
  //required:入力必須、string:文字列、max:文字数、regex:禁止文字

  $post = $request->input('newPost');
  // $name = $request->input('userName');
  $user_name = \Auth::user()->name;


  DB::table('posts')->insert([
    'contents' => $post,
    'user_name' => $user_name
  ]);

  return redirect('/index');
}


// 更新画面
public function updateForm($id)
{
  $user_name = \Auth::user()->name;

  $post = DB::table('posts')
  ->where('id', $id)
  ->first();
  return view('posts.updateForm', ['post' => $post,'user_name'=>$user_name]);
}


// 更新処理

public function update(Request $request)
{
  $request->validate([
  'upPost' => 'required|string|max:100|regex:/[^　]+$/'
  // 'userName' =>'required|string|regex:/[^　]+$/'
  ]);

  $id = $request->input('id');
  $up_post = $request->input('upPost');
  // $up_name = $request->input('upName');
  $user_name = \Auth::user()->name;

  DB::table('posts')
  ->where('id', $id)
  ->update(
    ['contents' => $up_post,
    'user_name' => $user_name]
  );

  return redirect('/index');
}


//削除処理
public function delete($id)
{
  DB::table('posts')
  ->where('id', $id)
  ->delete();

  return redirect('/index');
}


//検索処理
public function search(Request $request)
{
  $keyword = $request->input('keyWord');

  if (!empty($keyword)) {
    $list = DB::table('posts')
    ->where('contents', 'LIKE', "%{$keyword}%")
    ->get();
    return view('posts.index', ['lists' => $list]);
    //$listという変数をlistsという名前でviewに渡す(view側では「$lists」という変数が使用可能)
  } else {
    $list = DB::table('posts')->get();
    return view('posts.index', ['lists' => $list]);
  }
}

}
