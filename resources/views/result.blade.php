@extends('layouts.app')

@section('title', 'アップロード結果')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">実行結果</h1>

    <section class="mb-5">
        <h2 class="h4">Python 出力</h2>
        <pre class="bg-light p-3 border rounded">{{ $pythonOut }}</pre>
    </section>

    <section>
        <h2 class="h4 mb-3">アップロードした動画</h2>
        <video
            src="{{ asset('storage/' . $videoPath) }}"
            controls
            style="max-width: 100%; height: auto;">
            お使いのブラウザは video タグをサポートしていません。
        </video>
    </section>

    <div class="mt-4">
        <a href="{{ route('video.form') }}" class="btn btn-secondary">
            もう一度アップロード
        </a>
    </div>
</div>
@endsection
