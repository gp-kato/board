<?php

// 管理ページのログインパスワード
define( 'PASSWORD', 'adminPassword');

session_start();
if( !empty($_GET['btn_logout']) ) {
	unset($_SESSION['admin_login']);
}
if( !empty($_POST['btn_submit']) ) {
	if( !empty($_POST['admin_password']) && $_POST['admin_password'] === PASSWORD ) {
		$_SESSION['admin_login'] = true;
	} else {
		$error_message[] = 'ログインに失敗しました。';
	}
}

// 変数の初期化
$success_message = null;
$stmt = null;
$res = null;
$option = null;

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/style.css">
        <title>ひと言掲示板 管理ページ</title>
    </head>
    <body>
        <h1>ひと言掲示板 管理ページ</h1>
        @if ( !empty($error_message) )
            <ul class="error_message">
		        @foreach ( $error_message as $value )
                    <li>・<?php echo $value; ?></li>
		        @endforeach
            </ul>
        @endif
        <section>
            @if ( !empty($_SESSION['admin_login']) && $_SESSION['admin_login'] === true )
                <form method="get" action="csv-download">
                    @csrf
                    <select name="limit">
                        <option value="">全て</option>
                        <option value="10">10件</option>
                        <option value="30">30件</option>
                    </select>
                    <input type="submit" name="btn_download" value="ダウンロード">
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
                                            <p><a href="edit/<?= htmlspecialchars($data->id) ?>">編集</a>  <a href="delete/<?= htmlspecialchars($data->id) ?>">削除</a></p>
                                        </div>
                                        <p>{{ $data->message }}</p>
                                    </article>
                                </section>
                            </div>
                        </div>
                    @endforeach
                </div>

                <form method="get" action="">
                    <input type="submit" name="btn_logout" value="ログアウト">
                </form>

            @else

                <form method="post">
                    @csrf
                    <div>
                        <label for="admin_password">ログインパスワード</label>
                        <input id="admin_password" type="password" name="admin_password" value="">
                    </div>
                    <input type="submit" name="btn_submit" value="ログイン">
                </form>
            @endif
        </section>
    </body>
</html>
