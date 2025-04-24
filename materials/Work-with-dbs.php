<?php
// Пример выполнения SELECT запроса

// Подключение к базе данных (подключение через db_connect.php)
include 'db-connect.php';

// Пример SELECT запроса для извлечения данных из таблицы "users"
try {
  $stmt = $pdo->query("SELECT * FROM users"); // Выполнение запроса

  // Извлечение данных
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "User: " . $row['user'] . "<br>";
  }
} catch (PDOException $e) {
  echo "Ошибка при выполнении запроса: " . $e->getMessage();
}


// Пример выполнения INSERT запроса

// Параметры для добавляемого пользователя
$name = 'John Doe';
$email = 'john.doe@example.com';

// Подготовка SQL запроса с плейсхолдерами
$sql = "INSERT INTO users2 (name, email) VALUES (:name, :email)";

// Подготовка запроса
$stmt = $pdo->prepare($sql);

// Привязка значений к параметрам
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);

// Выполнение запроса
try {
  $stmt->execute(); // Выполнение запроса
  echo "✅ Запись успешно добавлена!";
} catch (PDOException $e) {
  echo "❌ Ошибка при добавлении записи: " . $e->getMessage();
}


// 3. UPDATE (Обновление данных)
// Запрос UPDATE используется для изменения существующих данных в таблице.

try {
  // Подготовленный запрос для обновления данных
  $stmt = $pdo->prepare("UPDATE users2 SET name = :name, email = :email WHERE id = :id");

  // Привязываем параметры
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':id', $id);

  // Устанавливаем значения
  $name = 'Jane Doe';
  $email = 'jane.doe@example.com';
  $id = 1;  // Идентификатор пользователя, которого мы хотим обновить

  // Выполнение запроса
  $stmt->execute();

  echo "✅ Запись обновлена!";
} catch (PDOException $e) {
  echo "Ошибка при обновлении записи: " . $e->getMessage();
}


// 4. DELETE (Удаление данных)
// Запрос DELETE используется для удаления данных из таблицы.

try {
  // Подготовленный запрос для удаления данных
  $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");

  // Привязываем параметр
  $stmt->bindParam(':id', $id);

  // Устанавливаем идентификатор записи для удаления
  $id = 2;

  // Выполнение запроса
  $stmt->execute();

  echo "✅ Запись удалена!";
} catch (PDOException $e) {
  echo "Ошибка при удалении записи: " . $e->getMessage();
}
