@extends('layouts.app')

@section('content')
<div class='container'>

<p class="pull-right"><a class="btn btn-success" href="/create-form">投稿する</a></p>

<h2 class='page-header'>投稿一覧</h2>

<table class='table table-hover'>

<tr>

<th>投稿No</th>

<th>投稿内容</th>

<th>投稿日時</th>

</tr>

@foreach ($lists as $list)

<tr>

<td>{{ $list->id }}</td>

<td>{{ $list->user_name }}</td>

<td>{{ $list->contents }}</td>

<td>{{ $list->created_at }}</td>

</tr>

@endforeach

</table>

</div>

@endsection
