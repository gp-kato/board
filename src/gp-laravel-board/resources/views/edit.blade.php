<?php

// 変数の初期化
$error_message = array();
$stmt = null;
$res = null;
$option = null;

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/style.css">
        <title>ひと言掲示板 管理ページ（投稿の編集）</title>
    </head>
    <body>
        <h1>ひと言掲示板 管理ページ（投稿の編集）</h1>
        @if ( !empty($error_message) )
            <ul class="error_message">
		        @foreach ( $error_message as $value )
                    <li>・<?php echo $value; ?></li>
		        @endforeach
            </ul>
        @endif
        <form method="post">
        @csrf
	        <div>
		        <label for="view_name">表示名</label>
                <input id="view_name" type="text" name="view_name" value="{{ old('view_name', $post->view_name) }}">
	        </div>
	        <div>
		        <label for="message">ひと言メッセージ</label>
                <textarea id="message" name="message">{{ old('message', $post->message) }}</textarea>
	        </div>
            <a class="btn_cancel" href="{{ url('/admin') }}">キャンセル</a>
	        <input type="submit" name="btn_submit" value="更新">
	        <input type="hidden" name="message_id" value="<?php if( !empty($message_data['id']) ){ echo $message_data['id']; } 
            elseif( !empty($_POST['message_id']) ){ echo htmlspecialchars( $_POST['message_id'], ENT_QUOTES, 'UTF-8'); } ?>">
        </form>
    </body>
</html>
