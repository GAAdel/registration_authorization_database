<?php

$login = filter_var(trim($_POST["login"]), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);

$mysql = new mysqli("localhost", "root", "", "register-bd");
$mysql->query("SET NAMES 'utf8'");

$password = md5($password . "dsdsf3223");

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$password'");
// получим все соответсвующие записи из БД (в формате объекта)

$user = $result->fetch_assoc();
if (count($user) == 0) {
  echo "Такой пользователь не найден";
  exit();
}

$mysql->close();

header('Location: account.html');
