<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsxgraph/1.1.0/jsxgraph.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jsxgraph/1.1.0/jsxgraphcore.min.js"></script>
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="content__post">
                <h3>本文</h3>
                <!-- <div id="function"><p>{{ $post->function }}</p></div>  
                <div id="start"><p>{{ $post->start }}</p></div>
                <div id="end"><p>{{ $post->end }}</p></div> -->
                <input type="text" id="function" value="{{ $post->function }}">
                <input type="number" id="start" value="{{ $post->start }}">
                <input type="number" id="end" value="{{ $post->end }}">
        </div>
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
            window.onload = () => {
                updateGraph();
            };
        </script>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>