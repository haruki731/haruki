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
    <div>
        <!-- // //グラフ
        // let board = JXG.JSXGraph.initBoard('plot', {
        //     boundingbox: [ -0.1, 1.1, 1.1, -0.1],  // 領域の座標[左、上、右、下]
        //     axis: true,  // 軸を表示する
        //     showNavigation: false,  // ナビゲーションボタンを表示しない
        //     showCopyright: false    // コピーライト文字列を表示しない
        // });

        // const text_css = 'font-family: "Times New Roman", Times, "serif"; font-style: italic';
        // board.create('text', [1.05, 0.08, 'x'],
        //     { fontSize: 16, cssStyle: text_css });
        // board.create('text', [0.05, 1.05, 'y'],
        //     { fontSize: 16, cssStyle: text_css });

        // //function
        // function bezier(x) {
        //     return {index:id-'function'};
        // }
        // let graph = board.create('functiongraph', [bezier, 'from', 'to']);

        // MathJax.typesetClear([$('.math').get(0)]);
        // const math = f(x)='function';
        // $('.math').html(math);
        // MathJax.typeset(); -->
    </div>
    
        <!-- <div id="jxgbox" class="jxgbox" style="width:2000px; height:500px;"></div>
    <script>
        var board = JXG.JSXGraph.initBoard('jxgbox', {axis:true, boundingbox: [-8, 4, 8, -4], showNavigation:true});
        var s = board.create('slider',[[1,3],[5,3],[1,10,1000]],{name:'n',snapWidth:1});
        var a = board.create('slider',[[1,2],[5,2],[-10,-10,0]],{name:'start'});
        var b = board.create('slider',[[1,1],[5,1],[0,10,10]],{name:'end'});
        // var f = function(x){ return Math.sin(x); };
        // Create an input element at position [1,4].
        var input = board.create('input', [0, 1, 'sin(x)*x', 'f(x)='], {cssStyle: 'width: 100px'});
        var f = board.jc.snippet(input.Value(), true, 'x', false);
        var graph = board.create('functiongraph',[f,
                function() {
                var c = new JXG.Coords(JXG.COORDS_BY_SCREEN,[0,0],board);
                return c.usrCoords[1];
                },
                function() {
                var c = new JXG.Coords(JXG.COORDS_BY_SCREEN,[board.canvasWidth,0],board);
                return c.usrCoords[1];
                }
            ]);
        board.create('text', [1, 3, '<button onclick="updateGraph()">Update graph</button>']);
        var updateGraph = function() {
            graph.Y = board.jc.snippet(input.Value(), true, 'x', false);
            graph.updateCurve();
            board.update();
        }
        var plot = board.create('functiongraph',[f,function(){return a.Value();}, function(){return b.Value();}]);
        var os = board.create('riemannsum',[f,
            function(){ return s.Value();}, function(){ return "left";},
            function(){return a.Value();},
            function(){return b.Value();}
            ],
            {fillColor:'#FFFF00', fillOpacity:1.3});
        board.create('text',[-6,-3,function(){ return 'Sum='+(JXG.Math.Numerics.riemannsum(f,s.Value(),'left',a.Value(),b.Value())).toFixed(4); }]);
    </script> -->

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
    var a = board.create('slider', [[1, 2], [5, 2], [-10, -10, 0]], { name: 'start' });
    var b = board.create('slider', [[1, 1], [5, 1], [0, 10, 10]], { name: 'end' });

    // 入力フィールド
    var input = board.create('input', [0, 1, 'sin(x)*x', 'f(x)='], { cssStyle: 'width: 100px' });

    // 関数を取得
    var f = board.jc.snippet(input.Value(), true, 'x', false);

    // グラフ描画
    var graph = board.create('functiongraph', [
        f,
        function () { return a.Value(); },
        function () { return b.Value(); }
    ]);

    // リーマン和
    var os = board.create('riemannsum', [
        f,
        function () { return s.Value(); },
        function () { return "left"; },
        function () { return a.Value(); },
        function () { return b.Value(); }
    ], {
        fillColor: '#FFFF00',
        fillOpacity: 0.7
    });

    // 結果表示
    board.create('text', [-6, -3, function () {
        return 'Sum=' + (JXG.Math.Numerics.riemannsum(f, s.Value(), 'left', a.Value(), b.Value())).toFixed(4);
    }]);

    // グラフ更新
    var updateGraph = function () {
        f = board.jc.snippet(input.Value(), true, 'x', false); // 新しい関数を設定
        graph.Y = f; // グラフ更新
        os.Y = f; // リーマン和を更新
        graph.updateCurve();
        os.update();
        board.update();
    };

    // 更新ボタン
    board.create('text', [1, 3, '<button onclick="updateGraph()">Update graph</button>']);
</script>
</body>
</html>