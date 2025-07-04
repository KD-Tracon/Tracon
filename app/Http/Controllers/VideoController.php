<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /** ←★ 追加：アップロード画面を表示するだけ */
    public function form()
    {
        return view('upload');          // resources/views/upload.blade.php
    }

    /**
     * 送信された動画を処理して結果を返す
     */
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,avi,mov,webm|max:512000',
        ]);

        // ① 保存
        $path = $request->file('video')->store('videos', 'public');

        // ② FastAPI へ送信
        $response = Http::attach(
                'file',
                Storage::disk('public')->get($path),
                basename($path)
            )
            ->timeout(30)                 // ← post() の **前** に移動
            ->post(config('services.python_api.url') . '/run')
            ->throw();

        // ③ 結果を表示
        return view('result', [
            'videoPath' => $path,
            'pythonOut' => $response['stdout'] ?? 'No output',
        ]);
    }
}
