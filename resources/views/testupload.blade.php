<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>アップロード画面</title>
<style>
    body {
    font-family: "Helvetica Neue", sans-serif;
    background: #f6f4fb;
    display: flex;
    justify-content: center;
    padding: 40px;
    }

    .container {
    background: white;
    border-radius: 16px;
    padding: 30px;
    width: 500px;
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
    margin-bottom: 16px;
    position: relative;
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

    .input-group {
    margin-bottom: 12px;
    }

    label {
    display: block;
    margin-bottom: 4px;
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
    margin-top: 20px;
    width: 100%;
    padding: 12px;
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
</style>
</head>
<body>
<div class="container">
    <h2>インプット</h2>

    <div class="upload-area">
    <span class="upload-label">動画を添付</span>
    <input type="file" accept="video/*">
    </div>

    <div class="input-group">
    <label for="place">場所</label>
    <input type="text" id="place" placeholder="Input">
    </div>

    <div class="input-group">
    <label for="weather">気候</label>
    <input type="text" id="weather" placeholder="Input">
    </div>

    <div class="input-group">
    <label for="temperature">気温</label>
    <input type="text" id="temperature" placeholder="Input">
    </div>

    <div class="input-group">
    <label for="time">時刻</label>
    <input type="time" id="time">
    </div>

    <div class="input-group">
    <label for="date">撮影日</label>
    <input type="date" id="date">
    </div>

    <button class=
"analyze-button">分析</button>
</div>
</body>
</html>
