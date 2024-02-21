<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="midjourney.css">
</head>
<body>
    <form action="making.php" method="post" name="addForm">
        <div class="choices">
            <div class="img_choice">
                <img src="man.png" id="man">
                <img src="woman.jpeg" id="woman">
            </div>
            <div class="img_choice">
                <input id="image_a" type="radio" value=0 name="maker" onclick="location.href='making.php?maker=' + this.value;">
                <label for="image_a"><img src="check.png"></label>
                <img src="bushi.png" id="text_a">
                <input id="image_b" type="radio" value=1 name="maker" onclick="location.href='making.php?maker=' + this.value;">
                <label for="image_b"><img src="check.png"></label>
                <img src="bijin.png" id="text_b">
            </div>           
        </div>
    </form>
</body>