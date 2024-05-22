<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class BbsController extends Controller
{
    public function index()
    {
        $bbs_data = $this->getMessages();
        return view('index', compact('bbs_data'));
    }

    public function add(Request $request)
    {
        $this->validateRequest($request);

        // データを配列に格納
        $data = [
            'view_name' => $request->view_name,
            'message' => $request->message,
            'post_date' => now()  // 現在の日付と時間を設定
        ];
    
        // データベースに挿入
        Message::insert($data);
    
        // リダイレクト
        return redirect('/');
    }

    public function admin()
    {
        $bbs_data = $this->getMessages();
        return view('admin', compact('bbs_data'));
    }

    public function delete(Message $message)
    {
        $message->delete();
        return redirect('admin');
    }

    public function edit(Message $message)
    {
        return view('edit', compact('message'));
    }
    
    public function update(Request $request, Message $message)
    {
        $this->validateRequest($request);

        // データを配列に格納
        $data = [
            'view_name' => $request->view_name,
            'message' => $request->message,
            'post_date' => now()  // 現在の日付と時間を設定
        ];

        // 既存のメッセージを更新
        $message->update($data);
    
        return redirect('admin');
    }

    private function getMessages()
    {
        return Message::where('message', 0)
            ->orderBy('id', 'desc')
            ->get();
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'view_name' => 'required|max:10',
            'message' => 'required|max:40',
        ]);
    }
}
