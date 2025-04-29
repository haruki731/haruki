<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsxgraph/1.1.0/jsxgraph.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsxgraph/1.1.0/jsxgraphcore.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <title>積分計算ツール</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 600px;
            text-align: center;
        }
        .graph-area {
            background-color: #eaeaea;
            border: 1px solid #ccc;
            border-radius: 8px;
            height: 300px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .integral-area {
            margin-bottom: 20px;
            font-size: 18px;
        }
        .integral-input {
            border: 1px solid #ddd;
            padding: 8px;
            border-radius: 4px;
            font-size: 16px;
        }
        .submit-button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #0056b3;
        }
        .graph-wrap {
            width: 260px;
        }
        .graph {
            width: 100%;
            height: 260px;
        }
  
    </style>
</head>
<body>
    <div class="container">
        <div class="graph-wrap">
            <!-- グラフの出力先(JSXGraph用) -->
            <div id="plot" class="graph">

            </div>
            <!-- 数式の出力先(MathJax用) -->
            <div class="math">
                
                <?php
                    // $f(x)='function', $a='from', $b='to',$M==2**20
                    // for(&i; i<=M;i++){
                    //     sum=O;
                    //     sum += f((b-a)i/M);
                    // }
                    // sum=sum/M;
                    // if(sum>=M){print(発散)}
                    // else()
                ?>
            </div>
        </div>
        <button class="submit-button">投稿する</button>
    </div>



<div id="jxgbox" class="jxgbox" style="width:2000px; height:500px;"></div>
<script>
    // 初期化ボード
    var board = JXG.JSXGraph.initBoard('jxgbox', {
        axis: true,
        boundingbox: [-8, 4, 8, -4],
        showNavigation: true
    });

    // スライダーを作成
    var s = board.create('slider', [[1, 3], [5, 3], [1, 10, 1000]], { name: 'n', snapWidth: 1 });
    var a = board.create('slider', [[1, 2], [5, 2], [-10, -5, 0]], { name: 'start' });
    var b = board.create('slider', [[1, 1], [5, 1], [0, 5, 10]], { name: 'end' });

    // 入力フィールド
    var input = board.create('input', [-1, 1, 'sin(x)', 'f(x)='], { cssStyle: 'width: 100px' });

    // 関数を取得
    var f = board.jc.snippet(input.Value(), true, 'x', false);

    // グラフとリーマン和オブジェクトを保持
    var graph = null;
    var os = null;

    // グラフ描画関数
    var drawGraph = function () {
        // 既存のグラフやリーマン和を削除
        if (graph) board.removeObject(graph);
        if (os) board.removeObject(os);

        // 新しい関数を取得
        f = board.jc.snippet(input.Value(), true, 'x', false);

        // 新しいグラフを描画
        graph = board.create('functiongraph', [
            f,
            function () { return a.Value(); },
            function () { return b.Value(); }
        ]);

        // リーマン和を再描画
        os = board.create('riemannsum', [
            f,
            function () { return s.Value(); },
            function () { return "left"; },
            function () { return a.Value(); },
            function () { return b.Value(); }
        ], {
            fillColor: '#FFFF00',
            fillOpacity: 0.7
        });

        board.update();
    };

    // 結果表示
    board.create('text', [-6, -3, function () {
        return 'Sum=' + (JXG.Math.Numerics.riemannsum(f, s.Value(), 'left', a.Value(), b.Value())).toFixed(4);
    }]);

    // 更新ボタン
    board.create('text', [-1, 3, '<button onclick="drawGraph()">Update graph</button>']);
</script>
</body>
</html>

