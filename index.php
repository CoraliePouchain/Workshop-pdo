<?php 


require_once './connec.php';

$pdo = new \PDO(DSN, USER, PASS);

$query = 'SELECT * FROM story';
$statement = $pdo->query($query);
$stories = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
    <?php foreach($stories as $story): ?>
        <li><?php echo $story['title'] . '<br> ' . $story['content'] . '<br>' . $story['author']?></li>
        <?php endforeach?>
    </ul>
</body>
</html>