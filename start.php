<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="midjourney.css">
</head>

<?php
    if (isset($_POST['camera'])) { //撮影ボタンが押された場合
        $command = 'python3 camera.py';
        exec($command, $output, $state);
    }
?>

<body>
    <form method="post">
        <div id="cam">
            <label for="camera">顔写真撮影</label><br>
            <button name="camera">カメラ</button>
            <label for="camera">撮影:C, 終了:Qをタイプ</label>
        </div>
    </form>
    <form action="making.php" method="post" name="addForm">
        <div class="choices">
            <div class="img_choice">
                <img src="man.png" id="man">
                <img src="woman.jpeg" id="woman">
            </div>
            <div class="img_choice2">
                <input id="image_a" type="radio" value=0 name="maker" onclick="showLoader(); location.href='making.php?maker=' + this.value;">
                <label for="image_a"><img src="check.png"></label>
                <img src="bushi.png" id="text_a">
                
                <input id="image_b" type="radio" value=1 name="maker" onclick="showLoader(); location.href='making.php?maker=' + this.value;">
                <label for="image_b"><img src="check.png"></label>
                <img src="bijin.png" id="text_b">
            </div>           
        </div>
    </form>
    <div id="Loading">
        <div id="layer_board_bg"></div>
        <div id="loadings">
            <img src="1-4-loading.gif" class="loadimg">
            <p class="loadmsg">
            処理中...<br>
            しばらくお待ち下さい。
            </p>
        </div>
    </div>
</body>

    <!-- script
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="mid-function.js"></script>
