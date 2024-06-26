@extends('layout')

@section('title', 'ひと言掲示板')

@section('header', 'ひと言掲示板')

@section('content')
    <form method="post" action="{{ route('add') }}">
        @csrf
	    <div>
		    <label for="view_name">表示名</label>
            <input id="view_name" type="text" name="view_name" value="{{ old('view_name') }}">
            @if (!empty($errors -> first('view_name')))
                <p class="error_message">{{ $errors -> first('view_name')}}</p>
            @endif
	    </div>
	    <div>
		    <label for="message">ひと言メッセージ</label>
		    <textarea id="message" name="message"></textarea>
            @if (!empty($errors -> first('message')))
                <p class="error_message">{{ $errors -> first('message')}}</p>
            @endif
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
