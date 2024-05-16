<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CsvDownloadController extends Controller
{
    public function downloadCsv(Request $request)
    {

        // Messageの全データを取得
        $query = Message::query();

        $limit = $request->limit;

        // ダウンロード件数の制限がある場合
        if (!is_null($limit)) {
            $query->limit($limit);
        }

        $messages = $query->get();

        $csvHeader = ['id', 'view_name', 'message', 'post_date'];
        $csvData = $messages->toArray();

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="messages.csv"',
        ]);

        return $response;
    }
}
