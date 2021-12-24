<?php
    include '../mysql_connect.php'; // Using database connection file here
    $id = $_GET['id'];
    $sql = "DELETE FROM `users` WHERE `id`=$id";
    $del = $pdo->query($sql);

    header("Location: ../index.php");
    if (!$del) exit('Ошибка удаления')
?>
