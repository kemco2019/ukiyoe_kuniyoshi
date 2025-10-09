<link rel="stylesheet" href="midjourney3.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;700&display=swap" rel="stylesheet">

<?php

header("refresh:60;url=finish.php");
$origin = $_GET['maker'];

if($origin == "0"){
    $img_a = "img/man.png";
}else{
    $img_a = "img/woman.jpeg";
}

echo '<div class="loop0">';
for($i=0; $i<=4; $i++){
    echo '<ul class="loop_box">';
    echo '  <li class="loop_item"><a href="#"><img src="img/1.jpeg" alt=""></a></li>';
    echo '  <li class="loop_item"><a href="#"><img src="img/2.jpeg" alt=""></a></li>';
    echo '  <li class="loop_item"><a href="#"><img src="img/3.jpeg" alt=""></a></li>';
    echo '  <li class="loop_item"><a href="#"><img src="img/4.jpeg" alt=""></a></li>';
    echo '</ul>';
}
echo '</div>';

echo '<div class="center_items">';
    echo '<div id="count">完成まで60秒...！</div>';

    echo '<div class="img_class">';
    echo '  <img src="'.$img_a.'" id="uki">';
    echo '  <img src="img/person.jpg" id="hito">';
    echo '</div>';
echo '</div>';

echo '<div class="loop1">';
for($i=0; $i<=4; $i++){
    echo '<ul class="loop_box">';
    echo '  <li class="loop_item"><a href="#"><img src="img/1.jpeg" alt=""></a></li>';
    echo '  <li class="loop_item"><a href="#"><img src="img/2.jpeg" alt=""></a></li>';
    echo '  <li class="loop_item"><a href="#"><img src="img/3.jpeg" alt=""></a></li>';
    echo '  <li class="loop_item"><a href="#"><img src="img/4.jpeg" alt=""></a></li>';
    echo '</ul>';
}
echo '</div>';
$command = 'python3 midjourney.py "' . $origin . '"';
exec($command, $output, $state);

?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
      let remaining = 60;
      const display = document.getElementById("count");
      display.textContent = `完成まで${remaining}秒...！`;

      const interval = setInterval(() => {
        remaining -= 10;
        if (remaining > 0) {
          display.textContent = `完成まで${remaining}秒...！`;
        } else {
          clearInterval(interval);
        }
      }, 10000);
    });
</script>