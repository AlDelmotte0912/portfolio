<?php
require_once('./lib/DB.php');
$conn = getpdo();

$id = $_POST['id'];
$title = $_POST["title"];
$author = $_POST["author"];
$finishedAt = $_POST["finishedAt"];
$status = $_POST["status"];

try {
    $sql = " UPDATE book
SET bookEnd= '$finishedAt', bookstatus= '$status'
WHERE bookTitle= '$title'; ";

    $conn->exec($sql);
    createAlert("le livre \" $title \"  à bien été modifié.", "info", "index.php?page=view/BOOK/books");

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

?>

<br><br><br><br>
<button><a href="index.php?page=view/BOOK/books">revenir a la page précédente</a></button>

