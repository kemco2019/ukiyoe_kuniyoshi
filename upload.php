<link rel="stylesheet" href="midjourney5.css">
<?php
    $host = "DATABASE_SERVER";
    $dbName = "DATABASE_NAME";
    $username = "USER_NAME";
    $password = "PASSWORD";
    $dsn = "mysql:host={$host};dbname={$dbName};charser=utf8";
    try {
        $dbh = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    if (is_null(@$_POST["image"])){
        echo "nullです";
    }else{
        $data = file_get_contents($_POST["image"]);
        $image = uniqid(mt_rand(), true);
        $image .= '.png';
        $file = "images/$image";
        file_put_contents($file,$data);
        $sql = "INSERT INTO ukiyoe2023_kuniyoshi (path)  VALUES (:file)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':file', $file, PDO::PARAM_STR);
        $stmt->execute();
        $message = 'アップロードが完了しました';
        echo '<div class="text">';
        echo $message;
        echo '</div>';
    }
?>
<a href="http://127.0.0.1:8080/YOUR_PATH/start.php" class="btn_03">戻る</a>
