
<?php
$host = "mysql57.kemco.sakura.ne.jp";
$dbName = "kemco_ukiyoe";
$username = "kemco";
$password = "h76-id_z";

$dsn = "mysql:host={$host};dbname={$dbName};charser=utf8";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
    $sql = 'SELECT * FROM ukiyoe2023_kuniyoshi';
    $stmt = $dbh->prepare($sql);
    //$stmt->bindValue(':id', 7, PDO::PARAM_INT);
try {
    $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = count($images);


?>
<head></head>
<header>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="hokusai.css">
</header>

<div class="img_container">
    <?php
        for ($i=0; $i < $count; $i++){
            echo '<a href="' . $images[$i]['path'] . '" data-lightbox="group"><img style = "background-color: #EAEAEA;" src="' . $images[$i]['path'] . '" alt="CLUSTER SEO" /></a>';
        }
    ?>
</div>
<a href="ai.php" class="btn_03">戻る</a>