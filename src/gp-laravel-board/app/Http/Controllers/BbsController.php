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
        $request = $this->validateRequest($request);

        // データベースに挿入
        $request['post_date'] = now();
        Message::create($request);

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
        $request = $this->validateRequest($request);
        $message->fill($request)->save();
        
        return redirect('admin');
    }
    
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'view_name' => 'required|max:10',
            'message' => 'required|max:40',
        ]);
    }

    private function getMessages()
    {
        return Message::orderBy('id', 'desc')->get();
    }
}
