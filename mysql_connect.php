<?php
  $user = 'mysql';
  $password = '';
  $db = 'test';
  $host = 'localhost';

  $dsn = 'mysql:host='.$host.';dbname='.$db;
  $pdo = new PDO($dsn, $user, $password);
?>
