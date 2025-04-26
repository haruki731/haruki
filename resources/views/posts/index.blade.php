<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>リーマン積分Webアプリ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px 0;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .secondary-button {
            background-color: #6c757d;
            margin-top: 10px;
        }
        .secondary-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">リーマン積分Webアプリ</h1>
        <div class="form-group">
            <label for="function">被積分関数</label>
            <input type="text" id="function" placeholder="例: x^2 + 3">
        </div>
        <div class="form-group">
            <label>積分区間</label>
            <input type="text" id="from" placeholder="から (例: 0)">
            <input type="text" id="to" placeholder="まで (例: 1)" style="margin-top: 10px;">
        </div>
        <button id='result' class='button'>
            <a href='/posts/result'>完了</a>
        </button>
        <button class="secondary-button">みんなの投稿を見る</button>
    </div>
</body>
</html>