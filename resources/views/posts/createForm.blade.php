@extends('layouts.app')

@section('content')
<div class='container'>

<h2 class='page-header'>新しく投稿する</h2>

<!-- エラーメッセージ表示 -->
@if ($errors->any())
<!--
  ・$errors:バリデーションを実行するしないに関わらずビューからアクセスすることができる変数
  ・$errors->any():変数$errorsの中にエラーメッセージがあるかどうかチェックを行うメソッド
 -->
<div>
  <ul>
    @foreach ($errors->all() as $error)
    <!-- $errors->all():バリデーションの中のチェックで発生したエラー情報が配列として保持されている -->
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<!-- urlが 'post/create' となっているところにフォームの値を送る -->
{!! Form::open(['url' => 'post/create']) !!}

<div class="form-group">

<p>ユーザー名: {{ $user_name }}</p>

{!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}

<!-- {!! Form::input('text', 'userName', null, ['required', 'class' => 'form-control','placeholder' => 'ユーザーネーム']) !!} -->

</div>

<button type="submit" class="btn btn-success pull-right">追加</button>

{!! Form::close() !!}

</div>

@endsection
