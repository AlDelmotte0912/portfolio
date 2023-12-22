<?php
include_once '../lib/db.php';
$conn = getpdo();


$identifiant = $_POST['identifiant'];
$email = $_POST['email'];
$password = $_POST['password'];
$bday = $_POST['bday'];
$gender = $_POST['gender'];

try {
    $sql = " INSERT INTO `user` (`userIdentifiant`, `userEmail`, `userPassword`, `userBday`, `userGender`) 
 VALUES ('$identifiant', '$email', '$password','$bday', '$gender' )";
    $conn->exec($sql);

    createAlert("vous avez bien été enregistré sous le nom de $identifiant", "success", "index.php?page=view/main");

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}