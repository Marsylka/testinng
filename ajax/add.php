<?php
  $firstname = trim(filter_var($_POST['firstname'], FILTER_SANITIZE_STRING));
  $lastname = trim(filter_var($_POST['lastname'], FILTER_SANITIZE_STRING));
  $stat = (isset($_POST['stat']))?'Active':'Not active';
  $role = trim(filter_var($_POST['role'], FILTER_SANITIZE_STRING));


  $error = '';
    if(strlen($firstname) <= 3)
      $error = 'Введите Имя!';
    else if(strlen($lastname) <= 3)
      $error = 'Введите Фамилию!';
    else if($role === 'Выберите роль!')
      $error = 'Выберите роль!';

    if($error != ''){
      echo $error;
      exit();
    }

  require_once '../mysql_connect.php';

  $sql = 'INSERT INTO users(firstname, lastname, stat, role) VALUES(?, ?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$firstname, $lastname, $stat, $role]);

  echo 'Готово';
 ?>
