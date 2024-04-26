<?php

// 変数の初期化
$current_date = null;
$success_message = null;
$stmt = null;
$res = null;

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/style.css">
        <title>ひと言掲示板</title>
    </head>
    <body>
        <h1>ひと言掲示板</h1>
        @if (!empty($success_message))
            <p class="success_message">{{ $success_message }}</p> 
        @endif
        @if (!empty($error_message))
            <ul class="error_message">
                @foreach ($error_message as $value)
                    <li>・{{ $value }}</li>
                @endforeach
            </ul>
        @endif
        <form method="post" action="bbs_add">
        @csrf
	        <div>
		        <label for="view_name">表示名</label>
                <input id="view_name" type="text" name="view_name" value="{{ old('view_name') }}">
	        </div>
	        <div>
		        <label for="message">ひと言メッセージ</label>
		        <textarea id="message" name="message"></textarea>
	        </div>
	        <input type="submit" name="btn_submit" value="書き込む">
        </form>
        <hr>
        <div class="bodywrapper">
            @foreach ($bbs_data as $data)
                <div class="messageRow">
                    <div class="message">
                        <section>
                            <article>
                                <div class="info">
                                    <h2>{{ $data->view_name }}</h2>
                                    <time>{{ $data->post_date }}</time>
                                </div>
                                <p>{{ $data->message }}</p>
                            </article>
                        </section>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>
