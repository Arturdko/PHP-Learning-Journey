<?php
// Функции:
function greatings($firstname = "John", $lastname = "Doe")
{
  if (isset($_POST["submit"])) {
    $fullname = " " . $firstname . " " . $lastname . "<br>";
    echo $fullname;
  }
}


//greatings($_POST["name"], $_POST["lastname"]);

if (empty($_POST["name"])) {
  greatings();
} else {
  greatings($_POST["name"], $_POST["lastname"]);
}

// Правильно:
function sayHi($name, $greeting = "Hello")
{
  echo "$greeting, $name!";
}


// Это вызовет ошибку
function sayHi2($greeting = "Hello", $name)
{
  echo "$greeting, $name!";
}


function printFruits(array $fruits = [])
{
  if (empty($fruits)) {
    echo "No fruits passed.\n";
  } else {
    foreach ($fruits as $fruit) {
      echo $fruit . "\n";
    }
  }
}

printFruits(["Apple", "Banana"]);
printFruits();  // сработает значение по умолчанию (пустой массив)



function addOne(&$number)
{
  $number++;
}

$value = 5;
addOne($value);
echo $value; // 6



function calculateDiscount($price, $discount = 10): float
{
  return $price - ($price * $discount / 100);
}

$final = calculateDiscount(100);         // 90
$custom = calculateDiscount(200, 25);    // 150

echo "Final price: $final\n";
echo "Custom price: $custom\n";


function example()
{
  return "Done!";
  echo "This will never show.";
}



function checkNumber($n)
{
  if ($n > 0) {
    return "Положительное число";
  } elseif ($n < 0) {
    return "Отрицательное число";
  } else {
    return "Ноль";
  }
}

print "<br>----------------------<br>";
echo checkNumber(5);   // Положительное число
echo checkNumber(-3);  // Отрицательное число
echo checkNumber(0);   // Ноль

/*
🔥 Кратко: что будет, если не написать return?
✅ Функция всё равно выполнится

❌ Но ничего не вернёт (по умолчанию null)

❌ Ты не сможешь сохранить или использовать результат функции



✅ Когда return обязателен?
Сценарий	Нужно return?
Хочешь вернуть результат (в переменную)	✅ Да
Хочешь просто что-то показать (echo)	❌ Нет
Функция делает вычисления	✅ Да
Функция ничего не возвращает (процедура)	❌ Нет

🧠 Но! Если ты используешь echo внутри функции, без return, ты можешь что-то увидеть на экране, но ты не получишь значение в переменную.

*/

// 1. Локальные переменные (по умолчанию внутри функции)
function sayHello()
{
  $name = "Anna";
  echo "Hello, $name!";
}

sayHello();        // Работает
//echo $name;        // ❌ Ошибка: переменной $name не существует вне функции


// 🔹 2. Глобальные переменные (global)
// Переменные, объявленные вне функций, называются глобальными, но внутри функции они не видны, пока ты не укажешь global.

$name = "Marek";

function greet()
{
  global $name;
  echo "Hello, $name!";
}

greet(); // Hello, Marek

// 🧠 Альтернатива: массив $GLOBALS

$name = "Lena";

function showName()
{
  echo $GLOBALS["name"];
}

showName();


// 🔹 3. static переменные
// static — это переменные внутри функции, которые сохраняют своё значение между вызовами.
// Обычная переменная обнулялась бы каждый раз. static сохраняет значение.
function counter()
{
  static $count = 0;
  $count++;
  echo $count . "\n";
}

counter(); // 1
counter(); // 2
counter(); // 3

// 🔹 Что такое рекурсия?
// Рекурсия — это способ, при котором функция вызывает саму себя, пока не достигнет условия выхода (иначе будет бесконечный цикл).

function countdown($n)
{
  if ($n <= 0) {
    return; // Условие выхода
  }

  echo $n . "<br>";
  countdown($n - 1); // Рекурсивный вызов
}

countdown(5);
/*
5
4
3
2
1
*/


function factorial($n)
{
  if ($n === 0) {
    return 1; // базовый случай: 0! = 1
  }
  return $n * factorial($n - 1); // рекурсивный вызов
}

/*
factorial(3)
→ 3 * factorial(2)
    → 2 * factorial(1)
        → 1 * factorial(0)
            → 1  (базовый случай)
        → 1 * 1 = 1
    → 2 * 1 = 2
→ 3 * 2 = 6
*/