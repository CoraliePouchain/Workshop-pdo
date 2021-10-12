<?php

require_once './connec.php';

$pdo = new \PDO(DSN, USER, PASS);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $content = trim($_POST['content']);

    $query = "INSERT INTO story (title, content, author) VALUES (:title, :author, :content)";

    $statement = $pdo->prepare($query);

    $statement->bindValue(':title', $title, \PDO::PARAM_STR);
    $statement->bindValue(':content', $content, \PDO::PARAM_STR);
    $statement->bindValue(':author', $author, \PDO::PARAM_STR);

    $statement->execute();

    header('Location: index.php');
}

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
    <form action = '' method = 'post'>
        <label for = 'title'>Title:</label>
        <input type = 'text' name = 'title' placeholder = 'title' id = 'title'><br>

        <label for = 'content'>Story:</label>
        <textarea name = 'content' placeholder = 'content' id = 'content'></textarea><br>

        <label for = 'author'>Author:</label>
        <input type = 'author' name = 'author' placeholder = 'author' id = 'author'><br>

        <button type = 'submit'>Submit</button>
    </form>
</body>
</html>