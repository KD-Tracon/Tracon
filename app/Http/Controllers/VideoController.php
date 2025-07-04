<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;   // ★追加
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * 動画アップロードフォームから呼ばれる処理。
     * 1) ファイルを storage/app/public/videos へ保存
     * 2) FastAPI に multipart POST
     * 3) 結果を Blade へ渡す
     */
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,avi,mov,webm|max:512000',
        ]);

        // ① 保存
        $path = $request->file('video')->store('videos', 'public');

        // ② FastAPI へ送信（Laravel 12 の HTTP Client）:contentReference[oaicite:4]{index=4}
        $response = Http::attach(
            'file',
            Storage::disk('public')->get($path),
            basename($path)
        )->post(config('services.python_api.url') . '/run')
         ->timeout(30)        // ネットワーク安全策
         ->throw();           // 4xx / 5xx は例外に

        // ③ Blade へ
        return view('result', [
            'videoPath' => $path,
            'pythonOut' => $response['stdout'] ?? 'No output',
        ]);
    }
}
