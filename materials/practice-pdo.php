<?php

// Подключение к базе данных:

$host = "localhost";
$db = "shopDB";
$user = "root";
$pass = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

try {
  $pdo = new PDO($dsn, $user, $pass);

  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //echo "<p>" . "✅ Подключение к базе данных успешно!!!" . "</p>" . "<br>";
} catch (PDOException $e) {
  //echo "<p>" . "❌ Ошибка подключения: " . $e->getMessage() . "</p>";
}

// SELECTING DB:

try {
  $stmt = $pdo->query("SELECT * FROM products");

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //echo "<p>" . $row["name"] . " - " . $row["price"] . " Kč</p>";
  }
} catch (PDOException $e) {
  //echo "<p>" . "❌ Ошибка при выполнении запроса: " . $e->getMessage() . "</p>";
}


// INSERTING DATA
$name = $_POST["name"];
$price = $_POST["price"];

$sql = "INSERT INTO products (name, price) VALUES (:name, :price)";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(":name", $name);
$stmt->bindParam(":price", $price);

try {
  if (isset($_POST["name"]) && isset($_POST["price"])) {
    $stmt->execute();
    //echo "<p>" . "✅ Запись успешно добавлена!" . "</p>";
  } else {
    //echo "<p>🟡 Данные не переданы через форму.</p>";
  }
} catch (PDOException $e) {
  //echo "<p>" . "❌ Ошибка при добавлении записи: " . $e->getMessage() . "</p>";
}
