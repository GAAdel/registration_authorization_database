<?php

$login = filter_var(trim($_POST["login"]), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
  echo "Недопустимая длина логина";
  exit();
} else if (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
  echo "Недопустимая длина имени";
  exit();
} else if (mb_strlen($password) < 2 || mb_strlen($password) > 10) {
  echo "Недопустимая длина пароля (от 2 до 10 символов)";
  exit();
}

$mysql = new mysqli("localhost", "root", "", "register-bd");
$mysql->query("SET NAMES 'utf8'");

$password = md5($password . "dsdsf3223");

$mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES ('$login', '$password', '$name')");

$mysql->close();

header('Location: index.php');
