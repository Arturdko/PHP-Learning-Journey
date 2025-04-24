<?php

// 5. Формы и данные от пользователя:

// Обработка данных из форм ($_GET, $_POST):
/**$username = $_GET["username"];
$email = $_GET["email"];
$password = $_GET["password"];

if (isset($_GET['register'])) {
  echo
  "Hi '$username' your email is '$email' and your password is '$password'";
} */


// Валидация данных:
// 🔧 Обработка и валидация:
/*
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $errors = [];

  $name = trim($_POST["username"]);
  $email = trim($_POST["email"]);

  // Проверка имени
  if (empty($name)) {
    $errors[] = "Имя обязательно!";
  }

  // Проверка email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Некорректный email!";
  }

  // Вывод ошибок или успех
  if (!empty($errors)) {
    foreach ($errors as $error) {
      echo "<p style='color:red;'>$error</p>";
    }
  } else {
    echo "<p style='color:green;'>Данные успешно отправлены!</p>";
    // Здесь можно сохранить в БД
  }
}
*/

// XSS-защита: htmlspecialchars, trim:

/*
// Bad practice:
// $name = $_POST['username'];

$name = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
echo $name;

*/

// Отправка формы на ту же страницу и вывод ошибок:

// Инициализация переменных
$name = $email = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Очищаем и проверяем поля
  $name = trim($_POST["name"]);
  $email = trim($_POST["email"]);

  // Проверка имени
  if (empty($name)) {
    $errors[] = "Поле 'Имя' обязательно.";
  }

  // Проверка email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Введите корректный email.";
  }

  // Если ошибок нет — успешная обработка
  if (empty($errors)) {
    echo "<p style='color:green;'>✅ Данные успешно отправлены!</p>";
    // Здесь можно сохранить данные или отправить email
    // Обнуляем поля после отправки
    $name = $email = "";
  }
}

?>

<!-- HTML-форма -->
<h2>Форма обратной связи</h2>

<!-- Вывод ошибок -->

<?php
/*
// синтаксис ":" if (!empty($errors)): ?>
  <ul style="color: red;">
    <?php foreach ($errors as $error): ?>
      <li><?= htmlspecialchars($error) ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; 
*/
?>


<?php
// Classic syntax:
if (!empty($errors)) {
  echo '<ul style="color:red;">';
  foreach ($errors as $error) {
    echo '<li>' . htmlspecialchars($error) . '</li>';
  }
  echo '</ul>';
}
?>


<form method="post" action="">
  <!-- Safe solution -->
  <!-- <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"> -->
  Имя: <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"><br><br>
  Email: <input type="text" name="email" value="<?= htmlspecialchars($email) ?>"><br><br>
  <input type="submit" value="Отправить">
</form>

<?php
/*
🔐 Используй filter_var():
При обработке данных из форм ($_POST, $_GET)

При проверке email, ссылок, чисел

Для очистки ввода перед сохранением в БД
*/
?>