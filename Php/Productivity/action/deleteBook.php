<?php
require_once('./lib/DB.php');
$conn = getpdo();

$id = $_POST['id'];
$title = $_POST["title"];
$author = $_POST["author"];
$finishedAt = $_POST["finishedAt"];
$status = $_POST["status"];

try {
    $sql = "DELETE FROM `book` WHERE bookTitle= '$title' AND bookAuthor= '$author' ; ";
    $conn->exec($sql);
    createAlert("le livre  \" $title \"  à bien été supprimé", "danger", "index.php?page=view/BOOK/books");

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

?>

<br>
<button><a href="index.php?page=view/BOOK/books">revenir a la page précédente</a></button>

