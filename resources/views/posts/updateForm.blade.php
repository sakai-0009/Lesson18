@extends('layouts.app')

@section('content')
<div class='container'>

<h2 class='page-header'>投稿内容を変更する</h2>

<!-- エラーメッセージ表示 -->
@if ($errors->any())
<div>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif


{!! Form::open(['url' => '/post/update']) !!}

<div class="form-group">

{!! Form::hidden('id', $post->id) !!}

<p>ユーザー名: {{ $user_name }}</p>

<!-- {!! Form::input('text', 'upName', $post->user_name, ['required', 'class' => 'form-control']) !!} -->

{!! Form::input('text', 'upPost', $post->contents, ['required', 'class' => 'form-control']) !!}

</div>

<button type="submit" class="btn btn-primary pull-right">更新</button>

{!! Form::close() !!}

</div>

@endsection
