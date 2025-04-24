<?php

session_start(); // запускаем сессию

$_SESSION["username"] = "John"; // записываем данные в сессию

echo "Привет, " . $_SESSION["username"] . "<br>";




if (!isset($_SESSION["counter"])) {
  $_SESSION["counter"] = 1;
} else {
  $_SESSION["counter"]++;
}

echo "Вы посетили эту страницу " . $_SESSION["counter"] . " раз(a)";


// Куки — это файлы на стороне пользователя, которые сохраняются в браузере.


// Установить куку (срок действия 1 час)
setcookie("user", "John", time() + 3600);

if (isset($_COOKIE["user"])) {
  echo "Привет, " . $_COOKIE["user"] . "<br>";
} else {
  echo "Кука не установлена";
}

setcookie("favourite_closes_brand", "Puma", time() + 3600);
echo "We know you like " . $_COOKIE["favourite_closes_brand"];

// ⚠️ setcookie() должен быть до вывода HTML или текста — иначе не сработает.


// Завершение сессии:


session_unset(); // очищает массив $_SESSION
session_destroy(); // завершает сессию
