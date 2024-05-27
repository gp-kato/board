@extends('layout')

@section('title', 'ひと言掲示板 管理ページ')

@section('header', 'ひと言掲示板 管理ページ')

@section('content')
    <section>
        <form method="get" action="{{ route('download') }}">
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
        <form method="post" action="{{ route('logout',) }}">
            @csrf
            <input type="submit" name="btn_logout" value="ログアウト">
        </form>
    </section>
@endsection
