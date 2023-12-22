<?php

$conn = getpdo();

$id = $_POST['id'];
$title = $_POST["title"];
$author = $_POST["author"];
$finishedAt = $_POST["finishedAt"];
$status = $_POST["status"];

try {
    $sql = "INSERT INTO `book`(`bookTitle`,`bookAuthor`, `bookEnd`,`bookstatus`)
            VALUES ('$title' , '$author' , '$finishedAt' , '$status')";

    $conn->exec($sql);
    createAlert("le livre \" $title \"  à bien été enregistré", "success", "index.php?page=view/BOOK/books");

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

?>

<br><br><br><br>
<button><a href="index.php?page=view/BOOK/books">revenir a la page précédente</a></button>

