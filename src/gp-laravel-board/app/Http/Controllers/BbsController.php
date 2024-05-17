<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Events\MessageSent;

class BbsController extends Controller
{
    public function index ()
    {
        $bbs_data = message::where('message', 0)
        ->orderBy('id', 'desc')
        ->get();
        return view ('index', compact('bbs_data'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'view_name' => 'required|max:10',
            'message' => 'required|max:40',
        ]);

        // リクエストからデータを取得
        $view_name = $request->view_name;
        $message = $request->message;
    
        // データを配列に格納
        $data = [
            'view_name' => $view_name,
            'message' => $message,
            'post_date' => now()  // 現在の日付と時間を設定
        ];
    
        // データベースに挿入
        Message::insert($data);
    
        // リダイレクト
        return redirect('/');
    }

    public function admin ()
    {
        $bbs_data = message::where('message', 0)
        ->orderBy('id', 'desc')
        ->get();
        return view ('admin', compact('bbs_data'));
    }

    public function delete (Message $message)
    {
        $message->delete();
    
        return redirect ('admin');
    }

    public function download (Request $request)
    {
        return view ('download');
    }

    public function edit (Message $message)
    {
        return view ('edit', compact('message'));
    }
    
    public function update(Request $request, Message $message)
    {
        $message->fill($request->all())->save();
        
        return redirect('admin');
    }
}
