<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

// 一覧表示
    public function index()
 {
  $list = DB::table('posts')->get();
  return view('posts.index',['lists'=>$list]);
 }


// 新規作成画面
 public function createForm()
{
return view('posts.createForm');
}


// 新規作成処理
public function create(Request $request)
{
$post = $request->input('newPost');
DB::table('posts')->insert([
'contents' => $post
]);

return redirect('/index');
}

// 認証機能
public function __construct()

{

$this->middleware('auth');

}
}
