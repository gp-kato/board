<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class BbsController extends Controller
{
    public function index ()
    {
        return view ('index');
    }

    public function store(Request $request)
    {
        // リクエストからデータを取得
        $name = $request->name;
        $message = $request->message;
    
        // データを配列に格納
        $data = [
            'view_name' => $name,
            'message' => $message
        ];
    
        // データベースに挿入
        Message::insert($data);
    
        // リダイレクト
        return redirect('/');
    }

    public function add (Request $request)
    {
        $name = $request->name;
        $message = $request->message;

        $data = [
            'view_name' => $name,
            'message' => $message
        ];
        Message::insert($data);

        return redirect('/');
    }

    public function admin ()
    {
        return view ('admin');
    }

    public function delete ()
    {
        return view ('delete');
    }

    public function download ()
    {
        return view ('download');
    }

    public function edit ()
    {
        return view ('edit');
    }
}
