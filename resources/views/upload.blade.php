<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アップロード画面</title>
  <style>
    body {
      font-family: "Helvetica Neue", sans-serif;
      background: #f6f4fb;
      display: flex;
      justify-content: center;
      padding: 40px;
      margin: 0;
    }

    .container {
      background: white;
      border-radius: 16px;
      padding: 30px;
      width: 1000px;
      max-width: 95%;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
      margin-bottom: 20px;
      color: #333;
    }

    .upload-area {
      background: #eae6f5;
      height: 150px;
      border-radius: 8px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 24px;
      position: relative;
      text-align: center;
    }

    .upload-area input[type="file"] {
      opacity: 0;
      position: absolute;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }

    .upload-label {
      color: #555;
      z-index: 1;
    }

    .form-row {
      display: flex;
      flex-wrap: wrap;
      margin: 0 -10px;
      gap: 40px; /* 横の余白を追加 */
    }

    .form-column {
      flex: 1;
      min-width: 300px;
      padding: 0 10px;
    }

    .input-group {
      margin-bottom: 40px; /* 下の間隔を広く */
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    .analyze-button {
      margin-top: 24px;
      width: 100%;
      padding: 14px;
      background-color: #c5b1f3;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }

    .analyze-button:hover {
      background-color: #ae94e3;
    }

    .alert {
      padding: 12px;
      margin-bottom: 20px;
      border-radius: 6px;
      background-color: #ffe0e0;
      color: #a33;
      font-size: 14px;
    }

    @media (max-width: 768px) {
      .form-row {
        flex-direction: column;
        margin: 0;
      }

      .form-column {
        width: 100%;
        padding: 0;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>インプット</h2>

    {{-- バリデーションエラー表示 --}}
    @if ($errors->any())
      <div class="alert">
        <ul class="mb-0">
          @foreach ($errors->all() as $msg)
            <li>{{ $msg }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- 動画が添付された通知 --}}
    @if (session('video_uploaded'))
      <div class="alert" style="background-color:#e0ffe0; color:#3a3;">
        「{{ session('video_uploaded') }}」が添付されました。
      </div>
    @endif

    <form method="POST" action="{{ route('video.store') }}" enctype="multipart/form-data">
      @csrf

      <div class="upload-area">
        <span class="upload-label" id="upload-label">動画を選択</span>
        <input type="file" id="video-input" name="video" accept="video/*" required>
      </div>

      <div class="form-row">
        <div class="form-column">
          <div class="input-group">
            <label for="place">場所</label>
            <input type="text" id="place" name="place" placeholder="例：渋谷交差点" required>
          </div>

          <div class="input-group">
            <label for="weather">気候</label>
            <input type="text" id="weather" name="weather" placeholder="例：晴れ / 曇り / 雨" required>
          </div>
        </div>

        <div class="form-column">
          <div class="input-group">
            <label for="temperature">気温</label>
            <input type="text" id="temperature" name="temperature" placeholder="例：28℃" required>
          </div>

          <div class="input-group">
            <label for="time">時刻</label>
            <input type="time" id="time" name="time" required>
          </div>

          <div class="input-group">
            <label for="date">撮影日</label>
            <input type="date" id="date" name="date" required>
          </div>
        </div>
      </div>

      <button type="submit" class="analyze-button">分析</button>
    </form>
  </div>

  <script>
    document.getElementById('video-input').addEventListener('change', function (event) {
      const file = event.target.files[0];
      const label = document.getElementById('upload-label');
      if (file) {
        label.textContent = '動画が添付されました：' + file.name;
        label.style.color = '#3a3';
      } else {
        label.textContent = '動画を選択';
        label.style.color = '#555';
      }
    });
  </script>
</body>
</html>
