<?php
session_start();
// Инициализация переменных
$name = $mess = "";

// Обработка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"] ?? "";
  $mess = $_POST["mess"] ?? "";
}

// Здесь можно добавить обработку, например, сохранение в БД

// DB connection:
$host = "localhost";
$db = "shopDB";
$user = "root";
$pass = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo '<p class = "checkbox"> ' . 'Database is connected ✅' . "</p>";
} catch (PDOException $e) {
  echo '<p class = "checkbox"> ' . '❌ Ошибка подключения: '  . $e->getMessage() . "</p>";
}

// При отправке:

// данные сохраняются в таблицу messages (name, message)

if (isset($_POST["send"])) {
  $name = trim($_POST["name"]);
  $mess = trim($_POST["mess"]);



  $sql = "INSERT INTO messages (name, message) VALUES (:name, :mess)";

  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':mess', $mess);



  try {
    $stmt->execute();
    $_SESSION["success"] = "✅ Запись успешно добавлена!";
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
  } catch (PDOException $e) {
    $_SESSION["success"] = "❌ Ошибка: " . $e->getMessage();
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
  }
}

if (isset($_SESSION["success"])) {
  echo '<p class="checkbox2" style="text-align:center;">' . $_SESSION["success"] . '</p>';
  unset($_SESSION["success"]);
}
?>

<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  Name:
  <input type="text" name="name" required value="<?= trim(htmlspecialchars($name)); ?>"><br>
  Message:
  <textarea name="mess" class="mess" rows="4" required><?= trim(htmlspecialchars($mess)); ?></textarea>
  <input type="submit" name="send" value="Send">
</form>