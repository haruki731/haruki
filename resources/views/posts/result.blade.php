<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsxgraph/1.1.0/jsxgraph.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsxgraph/1.1.0/jsxgraphcore.min.js"></script>
    <title>積分計算ツール</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        .input-area {
            /* position: absolute; */
            position: right;
            top: 10px;
            left: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
        }
        .input-area label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .input-area input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .input-area button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .input-area button:hover {
            background-color: #0056b3;
        }
        .output-area {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
        }
        #jxgbox {
            width: 1000px;
            height: 500px;
            margin: 50px auto;
        }
    </style>
</head>
<body>
    <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class='result'>
                <div class="input-area">
                    <label for="function">被積分関数:</label>
                    <input type="text" id="function" name="post[function]" placeholder="例: sin(x)*x">
                    
                    <label for="start">積分区間開始点:</label>
                    <input type="number" id="start" name="post[start]" placeholder="例: -5">
                    
                    <label for="end">積分区間終了点:</label>
                    <input type="number" id="end" name="post[end]" placeholder="例: 5">
                    
                    <button onclick="updateGraph()">アップデート</button>
                    <div class="output-area" id="result">Sum = </div>
                </div>    
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
        <input type="submit" value="投稿する"/>
    </form>



<div id="jxgbox"></div>

<script>
    // 初期化ボード
    var board = JXG.JSXGraph.initBoard('jxgbox', {
        axis: true,
        boundingbox: [-8, 4, 8, -4],
        showNavigation: true
    });

    // グラフとリーマン和オブジェクトを保持
    var graph = null;
    var os = null;

    // グラフ描画関数
    var updateGraph = function () {
        // 入力値を取得
        var func = document.getElementById("function").value;
        var start = parseFloat(document.getElementById("start").value);
        var end = parseFloat(document.getElementById("end").value);

        // 入力値が有効かチェック
        if (!func || isNaN(start) || isNaN(end)) {
            alert("正しい値を入力してください！");
            return;
        }

        // 既存のグラフとリーマン和を削除
        if (graph) board.removeObject(graph);
        if (os) board.removeObject(os);

        // 新しい関数を設定
        var f = board.jc.snippet(func, true, 'x', false);

        // グラフ描画
        graph = board.create('functiongraph', [
            f,
            //function () { return start; },
            //function () { return end; }
        ]);

        // リーマン和描画
        os = board.create('riemannsum', [
            f,
            function () { return (end-start)*1000; }, // 分割数を固定値に設定
            function () { return "left"; },
            function () { return start; },
            function () { return end; }
        ], {
            fillColor: '#FFFF00',
            fillOpacity: 0.7
        });

        // 積分結果を表示
        var sum = JXG.Math.Numerics.riemannsum(f, 1000, 'left', start, end).toFixed(4);
        document.getElementById("result").textContent = "Sum = " + sum;

        board.update();
    
    };
</script>
<!-- <a href='/posts/create'>[ 投稿する ]</a> -->
<a href='/posts/create/{func}/{start}/{end}'>[ 投稿する ]</a>

<a href="/posts/posts">[ みんなの投稿を見る ]</a>

</body>
</html>