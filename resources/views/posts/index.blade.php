@extends('layouts.app')

@section('content')
<div class='container'>
<div class="button-wrapper">
<!-- 投稿ボタン -->
<p class="pull-right"><a class="btn btn-success" href="/create-form">投稿する</a></p>

<!-- 検索欄 -->
{!! Form::open(['url' => '/search']) !!}
{!! Form::input('text', 'keyWord','', ['class' => 'form-control','placeholder' => '検索ワードを入力']) !!}
<!-- <p class="pull-right"><a class="btn btn-search" href="/search">検索する</a></p> -->
<button type="submit" class="btn btn-search">検索</button>
</div>

<h2 class='page-header'>投稿一覧</h2>


<table class='table table-hover'>

<tr>
<th>投稿No</th>
<th>投稿者</th>
<th>投稿内容</th>
<th>投稿日時</th>
</tr>

@if (count($lists) === 0)
検索結果は０件です。
@endif


@foreach ($lists as $list)
<tr>
<td>{{ $list->id }}</td>
<td>{{ $list->user_name }}</td>
<td>{{ $list->contents }}</td>
<td>{{ $list->created_at }}</td>

<td><a class="btn btn-primary" href="/post/{{ $list->id }}/update-form">更新</a></td>

<td><a class="btn btn-danger" href="/post/{{ $list->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>

</tr>

@endforeach
</table>
</div>
@endsection
