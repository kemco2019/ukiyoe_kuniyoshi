<link rel="stylesheet" href="midjourney3.css">
<?php

header("refresh:60;url=finish.php");
$origin = $_GET['maker'];

if($origin == "0"){
    $img_a = "man.png";
}else{
    $img_a = "woman.jpeg";
}

echo '<div class="loop0">';
for($i=0; $i<=4; $i++){
    echo '<ul class="loop_box">';
    echo '  <li class="loop_item"><a href="#"><img src="1.jpeg" alt=""></a></li>';
    echo '  <li class="loop_item"><a href="#"><img src="2.jpeg" alt=""></a></li>';
    echo '  <li class="loop_item"><a href="#"><img src="3.jpeg" alt=""></a></li>';
    echo '  <li class="loop_item"><a href="#"><img src="4.jpeg" alt=""></a></li>';
    echo '</ul>';
}
echo '</div>';

echo '<div class="img_class">';
echo '  <img src="'.$img_a.'" id="uki">';
echo '  <img src="person.jpg" id="hito">';
echo '</div>';

echo '<div class="loop1">';
for($i=0; $i<=4; $i++){
    echo '<ul class="loop_box">';
    echo '  <li class="loop_item"><a href="#"><img src="1.jpeg" alt=""></a></li>';
    echo '  <li class="loop_item"><a href="#"><img src="2.jpeg" alt=""></a></li>';
    echo '  <li class="loop_item"><a href="#"><img src="3.jpeg" alt=""></a></li>';
    echo '  <li class="loop_item"><a href="#"><img src="4.jpeg" alt=""></a></li>';
    echo '</ul>';
}
echo '</div>';
$command = 'python3 midjourney.py "' . $origin . '"';
exec($command, $output, $state);

?>

