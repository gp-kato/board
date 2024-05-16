@extends('layout')

@section('title', 'ひと言掲示板 管理ページ')

@section('header', 'ひと言掲示板 管理ページ')

@section('content')
    <section>
        <form method="POST" action="admin">
            @csrf
            <div>
                <label for="admin_password">ログインパスワード</label>
                <input id="admin_password" type="password" name="admin_password" value="">
            </div>
            <input type="submit" name="btn_submit" value="ログイン">    
        </form>
    </section>
@endsection
