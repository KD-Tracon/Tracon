@extends('layouts.app')

@section('title', '動画をアップロード')

@section('content')
<div class="container py-4">
    <h1 class="mb-3">動画をアップロード</h1>

    {{-- バリデーションエラー --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('video.store') }}"
          enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input type="file"
                   name="video"
                   accept="video/*"
                   class="form-control"
                   required>
            <small class="form-text text-muted">
                mp4 / avi / mov / webm・最大 500 MB
            </small>
        </div>

        <button type="submit" class="btn btn-primary">
            送信
        </button>
    </form>
</div>
@endsection
