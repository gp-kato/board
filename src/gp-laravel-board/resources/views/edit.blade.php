@extends('layout')

@section('title', 'ひと言掲示板 管理ページ（投稿の編集）')

@section('header', 'ひと言掲示板 管理ページ（投稿の編集）')

@section('content')
    <form method="post">
		@csrf
		<div>
			<label for="view_name">表示名</label>
        	<input id="view_name" type="text" name="view_name" value="{{ old('view_name', $message->view_name) }}">
            @if (!empty($errors -> first('view_name')))
                <p class="error_message">{{ $errors -> first('view_name')}}</p>
            @endif
		</div>
		<div>
			<label for="message">ひと言メッセージ</label>
        	<textarea id="message" name="message">{{ old('message', $message->message) }}</textarea>
            @if (!empty($errors -> first('message')))
                <p class="error_message">{{ $errors -> first('message')}}</p>
            @endif
		</div>
    	<a class="btn_cancel" href="/admin">キャンセル</a>
		<input type="submit" name="btn_submit" value="更新">
	</form>
@endsection
