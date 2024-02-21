<link rel="stylesheet" href="midjourney4.css">
<?php

$command = 'python3 camera.py';
exec($command, $output, $state);

echo '<div class="img_class">';
echo '  <img src="capture.png" id="cap">';
echo '</div>';
echo '<div class="img_class">';
echo '  <img src="quit.png" id="quit">';
echo '</div>';

?>

