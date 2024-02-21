<link rel="stylesheet" href="midjourney2.css">
<?php
$path = "output/";
$latest_mtime = 0;
$latest_file = '';
if($handle = opendir($path)){
    while(false !== ($file = readdir($handle))){
        if ($file != "." && $file != "..") {
            $fname = $path.$file;
            $mtime = filemtime( $fname );
            if( $mtime > $latest_mtime ){
                $latest_mtime = $mtime;
                $latest_file = $fname;
            }
        }
    }
    closedir($handle);
}

$last_line = '';
$handle = fopen("myfile.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $last_line = $line;
    }
    fclose($handle);
}

echo '<form action="https://studio.kemco.keio.ac.jp/ukiyoe2023/upload.php" name="Form1" method="POST" enctype="multipart/form-data">';
echo '<input type="hidden" name="image" value=';
echo $last_line;
echo '>';
echo '<input type="submit" name="upload" value="保存" id="save">';
echo '</form>';

echo '<div class="img_class">';
echo '<img src=';
echo $latest_file;
echo ' id="result">';
echo '</div>';

?>

