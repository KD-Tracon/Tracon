<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メニュー画面</title>
  <style>
    body {
      font-family: "Helvetica Neue", sans-serif;
      background-color: #f9f8fc;
      margin: 0;
      padding: 20px;
    }

    .container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }

    .left-section {
      max-width: 50%;
    }

    .right-section {
      text-align: right;
    }

    h2 {
      font-size: 18px;
      color: #444;
    }

    .data-list {
      margin-top: 20px;
    }

    .data-button {
      display: flex;
      align-items: center;
      background-color: white;
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 10px 16px;
      margin-bottom: 10px;
      font-size: 16px;
      text-decoration: none;
      color: #333;
      width: fit-content;
    }

    .data-button:hover {
      background-color: #f0f0f0;
    }

    .icon {
      margin-right: 10px;
    }

    .upload-btn {
      background-color: #9b8cdc;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }

    .upload-btn:hover {
      background-color: #8a7ac6;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="left-section">
      <h2>分析結果一覧</h2>
      <div class="data-list">
        @foreach ($results as $result)
          <a href="{{ route('result.show', ['id' => $result->id]) }}" class="data-button">
            <span class="icon">📄</span> {{ $result->title }}
          </a>
        @endforeach
      </div>
    </div>
    <div class="right-section">
      <form action="{{ route('upload') }}" method="get">
        <button class="upload-btn">アップロード</button>
      </form>
    </div>
  </div>
</body>
</html>

