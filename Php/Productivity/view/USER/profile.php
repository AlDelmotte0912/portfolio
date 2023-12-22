<?php
$connect = getpdo();

$getUsers = $connect->prepare("SELECT * FROM user WHERE userId = ? ");
$getUsers->execute([$_SESSION['userId']]);
$user = $getUsers->fetchObject();


?>
<h2>Profil</h2>
<table class="table" style="max-width:600px;">
    <tr>
        <th>Identifiant</th>
        <td><?= $user->userLogin ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= $user->userEmail ?></td>
    </tr>
</table>


<a href="index.php?page=view/USER/logout">logout</a>