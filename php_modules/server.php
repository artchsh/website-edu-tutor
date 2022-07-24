<?php
   session_start();
   if (!isset($_SESSION['loggedin'])) {
   	header('Location: ../index.html');
   	exit;
   }
   $DATABASE_HOST = 'ilmira';
   $DATABASE_USER = 'root';
   $DATABASE_PASS = 'root';
   $DATABASE_NAME = 'phplogin';
   $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
   if (mysqli_connect_errno()) {
   	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
   }
   $stmt = $con->prepare('SELECT id, admin, expirationDate, name, surname FROM accounts WHERE id = ?');
   $stmt->bind_param('i', $_SESSION['id']);
   $stmt->execute();
   $stmt->bind_result($id, $admin, $expirationDate, $name, $surname);
   $stmt->fetch();
   $stmt->close();
   // TODO добавить первоначальную страницу после логина
   // TODO Потом сделать страницу регистрации. И покупки подписки
?>