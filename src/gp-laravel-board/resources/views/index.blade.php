@extends('layout')

@section('title', 'ひと言掲示板')

@section('header', 'ひと言掲示板')

@section('content')
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
@endsection
