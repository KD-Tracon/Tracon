<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>アップロード中画面</title>
<style>
    body {
        align-items: center;
        text-align: center;
        user-select:  none; /*キャレットが表示されないように設定*/
    }

    h2 {
        margin-top: 100px;
        font-size: 48px;
    }

    .time-left {
        color:#19A3FF;
        font-size: 24px;
        margin-top: 100px;
        margin-bottom: 20px;
    }

    .progress-bar {
      width: 60%;
      height: 60px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
      overflow: hidden;
      margin: 0 auto 12px; /* 中央寄せ */
      margin-bottom: 12px;
    }

    .progress-fill {
      height: 100%;
      background-color: #A2DAFF;
      width: 45%; /* 進捗率をここで調整（例：45%） */
      transition: width 0.5s ease;
    }

    .info-text {
        font-size: 20px;
        margin-top: 10px;
    }

    .menu-button {
      margin-top: 100px;
      padding: 10px 24px;
      border: 1px solid #333;
      background: white;
      border-radius: 6px;
      font-size: 28px;
      cursor: pointer;
    }

    .menu-button:hover {
      background: #f0f0f0;
    }
</style>
</head>
<body>
    <h2>動画解析中</h2>
    <div class="time-left">残り時間　2時間23分</div> <!-- laravelのコントローラーとかで残り時間を計算する処理を入れる必要あり -->
    <div class="progress-bar">
        <div class="progress-fill" style="width: 45%;"></div> <!-- %の値を変えることでwidth変更可能 -->
    </div>
    <div class="info-text">動画解析が完了するとメニュー画面から分析結果を確認できます。</div>
    <button class="menu-button" onclick="location.href='{{ route('menu') }}'">
        メニュー画面へ戻る
    </button>
</body>
</html>
