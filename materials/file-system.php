<?php

// 6. Работа с файлами:
// Чтение/запись в файл: fopen, fwrite, fread, file_put_contents, file_get_contents

// 🔧 Открытие файла — fopen()
file_put_contents("example.txt", "Some text\n");
$handle = fopen("example.txt", "r"); // "r" — открыть для чтения
//echo $handle . "<br>";

// ✍️ Запись в файл — fwrite()
$handle = fopen("example.txt", "w");
fwrite($handle, "Привет, мир!");
fclose($handle);

// 📖 Чтение из файла — fread()
$handle = fopen("example.txt", "r");
$content = fread($handle, filesize("example.txt"));
fclose($handle);

//echo $content;


// ✅ Упрощённый способ — file_put_contents()
// Открывает (или создаёт) файл и записывает строку.
// Автоматически закрывает файл — проще, чем fopen() + fwrite() + fclose().
file_put_contents("example.txt", "Новая строка!Новая строка!Новая строка!Новая строка!");


// ✅ Упрощённый способ — file_get_contents()
// Считывает весь файл в одну строку.
// Удобен для простого чтения небольших файлов.
$content = file_get_contents("example.txt");
//echo $content;


// Запись
file_put_contents("log.txt", "Лог от " . date("Y-m-d H:i:s") . "\n", FILE_APPEND);

// Чтение
$data = file_get_contents("log.txt");
//echo nl2br($data); // nl2br — чтобы \n превратить в <br> для HTML

// Exersices:
file_put_contents("notes.txt", "Username: username;\n Password: password;\n");
file_put_contents("notes.txt", "email: youremail@gmail.com\n", FILE_APPEND);
$text = file_get_contents("notes.txt");
echo nl2br($text);

// Delete file:
if (file_exists('notes.txt')) {
  unlink('notes.txt');
}

// this will create error:
$text2 = file_get_contents("notes.txt");
echo nl2br($text2);

file_put_contents("newfile.txt", "Some text");
unlink('newfile.txt');

$files = scandir('data');

var_dump($files);

foreach ($files as $file) {
  if ($file !== '.' && $file !== '..') {
    echo $file . "<br>";
  }
}

// Create directory:
mkdir('data2');

// Delete directory if it is empty:
rmdir('data2');

/*
3. 💡 Микро-проект (если останется время)
Сделай форму, которая сохраняет сообщения в файл (типа гостевой книги):

поле textarea

при отправке сообщение добавляется в файл guestbook.txt

при открытии страницы — показываются все сообщения
*/

?>


<?php
echo "\n------Микро-проект---------\n";

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["feedback"])) {
  $feedback = trim($_POST["feedback"]);
  $feedback = htmlspecialchars($feedback);
  $date = date("Y-m-d H:i:s");
  file_put_contents("guestbook.txt", "[$date] $feedback\n", FILE_APPEND);
}

$content = file_exists("guestbook.txt") ? file_get_contents("guestbook.txt") : "";
?>

<form method="post">
  <p>Please leave your feedback:</p>
  <textarea name="feedback"></textarea><br>
  <input type="submit" value="Send">
</form>

<hr>
<h3>Previous messages:</h3>
<div style="white-space: pre-wrap;">
  <?= $content ?>
</div>