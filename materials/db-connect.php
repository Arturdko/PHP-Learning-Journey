<?php
// Подключение к базе данных через PDO
// Вот базовый шаблон подключения:

$host = 'localhost';        // или 127.0.0.1
$db   = "businessdb"; // нaзвaниe_бд
$user = "root"; // 'имя_пользователя';
$pass = ''; // your_password
$charset = 'utf8mb4';


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
  // Создаём объект PDO и подключаемся
  $pdo = new PDO($dsn, $user, $pass);

  // Включаем режим обработки ошибок (исключения)
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "✅ Подключение к базе данных успешно!";
} catch (PDOException $e) {
  // Обработка ошибки: вывод сообщения о проблеме
  echo "❌ Ошибка подключения: " . $e->getMessage() . "<br>";

  echo "Ошибка SQL: " . $e->getMessage() . "<br>";
  echo "Код ошибки: " . $e->getCode() . "<br>";
  echo "Произошло в файле: " . $e->getFile() . "<br>";
  echo "На строке: " . $e->getLine() . "<br>";
}





// 🧠 Объяснение:
// new PDO(...) — создаёт подключение.

// setAttribute() — включает отображение ошибок (очень важно при отладке).

// Блок try/catch — ловит ошибку подключения и выводит её.