<?php

declare(strict_types=1);
//include("header.html")
//session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php //$username = "Artur";

  if (!empty($username)) {
    echo "<h1> Hello Dear user: {$username}</h1>";
  }  ?>

  <!-- <form action="index.php" method="post">
    <input type="checkbox" name="foods[]" value="pizza">Pizza<br>
    <input type="checkbox" name="foods[]" value="souce">Souce<br>
    <input type="checkbox" name="foods[]" value="desert">Desert<br>
    <input type="submit" name="confirm" value="Submit">
  </form> -->

  <!-- language select form -->
  <!-- <form action="" method="post">
    <label>Выберите язык интерфейса:</label><br>
    <select name="lang">
      <option value="ru">Русский</option>
      <option value="en">English</option>
    </select><br><br>
    <input type="submit" value="Сохранить выбор">
  </form> -->





</body>

</html>


<?php
include("practice.php")

//////////////////////////////////////////////

//include("/xampp/htdocs/website/materials/db-connect.php");
//include("/xampp/htdocs/website/materials/work-with-dbs.php");






















////////////////////////////////
// Функции работы с массивами:
/*
$users = [
  ["name" => "Anna", "age" => 25],
  ["name" => "Ivan", "age" => 17],
  ["name" => "Olga", "age" => 30],
];

$adults = array_filter($users, function ($user) {
  return $user["age"] >= 18;
});

print_r($adults) . "<br>";




$arr1 = [1, 2, 3];
$arr2 = [4, 5, 6];
echo count($arr1) . "<br>";
echo sort($arr1); // Сортирует по значениям, сброс ключей
$arr3 = array_merge($arr1, $arr2);
//var_dump($arr3);
$arr4 = $arr1 + $arr2;
//var_dump($arr4);

$matrix = [
  [1, 2, 3],
  [4, 5, 6],
  [7, 8, 9]
];
sort($matrix);
//echo count($matrix);
array_push($matrix[0], 12);
unset($matrix[0][3]); // delete variable from an array or alone variable
//var_dump($matrix);

foreach ($matrix as $rows) {
  foreach ($rows as $elements) {
    //echo $elements . "<br>";
  }
}

// output array(3) { [0]=> array(3) { [0]=> int(1) [1]=> int(2) [2]=> int(3) } [1]=> array(3) { [0]=> int(4) [1]=> int(5) [2]=> int(6) } [2]=> array(3) { [0]=> int(7) [1]=> int(8) [2]=> int(9) } }

//$number = 42;
//var_dump($number);
// Выведет: int(42)
*/
/////////////////////////////////////

/////////////////////////////////////
/*
// Многомерные массивы

$matrix = [
  [1, 2, 3],
  [4, 5, 6],
  [7, 8, 9]
];

echo $matrix[0][0]; // Выведет: 1
echo $matrix[1][2]; // Выведет: 6


$cube = [
  [
    [1, 2],
    [3, 4]
  ],
  [
    [5, 6],
    [7, 8]
  ]
];

echo $cube[0][1][0]; // Выведет: 3
echo $cube[1][0][1]; // Выведет: 6


$matrix = [];

$matrix[0][0] = 1;
$matrix[0][1] = 2;
$matrix[1][0] = 3;
$matrix[1][1] = 4;

echo $matrix[1][1]; // Выведет: 4


$matrix = [
  [1, 2, 3],
  [4, 5, 6],
  [7, 8, 9]
];

foreach ($matrix as $row) {
  foreach ($row as $value) {
    echo $value . " ";  // Выведет: 1 2 3 4 5 6 7 8 9
  }
  echo "\n";
}


$students = [
  ['name' => 'Alice', 'grades' => [85, 90, 78]],
  ['name' => 'Bob', 'grades' => [92, 88, 94]],
  ['name' => 'Charlie', 'grades' => [70, 75, 80]]
];

foreach ($students as $student) {
  $average = array_sum($student['grades']) / count($student['grades']);
  echo $student['name'] . " has an average grade of " . $average . "<br>";
}
// Вывод:
// Alice has an average grade of 84.333333333333
// Bob has an average grade of 91.333333333333
// Charlie has an average grade of 75
*/
/////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////
/*
// Операторы break, continue:
for ($i = 0; $i < 10; $i++) {
  if ($i == 5) {
    continue;  // Пропускает итерацию, когда $i равно 5
  }
  echo $i . "\n";
}
// Вывод: 0, 1, 2, 3, 4, 6, 7, 8, 9


for ($i = 0; $i < 10; $i++) {
  if ($i == 5) {
    break;  // Прерывает цикл, когда $i равно 5
  }
  echo $i . "\n";
}
// Вывод: 0, 1, 2, 3, 4
*/
////////////////////////////////////////////////////////



// Registration form:
/*
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);



  if (empty($username)) {
    echo "Please enter your username";
  } elseif (empty($password)) {
    echo "PLease enter a password";
  } else {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (user, password)
    VALUES ('$username', '$hash')";

    try {
      mysqli_query($conn, $sql);
      echo "You are succesfully registered!";
    } catch (mysqli_sql_exception) {
      echo "That username is taken";
    }
  }
}

mysqli_close($conn);
*/
/////////////////////////////////////////////

/////////////////////////////////////////////
/*
// Insert data into MySQL database:
$username = $_POST["username"];
//$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

// $username = "Newuser";
// $password = password_hash("sdfdfd3433", PASSWORD_DEFAULT);

$sql = "INSERT INTO users (user, password)
        VALUES('$username', '$password')";

try {
  mysqli_query($conn, $sql);
  echo "User is now registered";
} catch (mysqli_sql_exception) {
  echo "Could not register user";
}

mysqli_close($conn);
*/
////////////////////////////////////////

/*
/////////////////////////////////////////
// hashing
$password = "mypassword123";
$hash = password_hash($password, PASSWORD_DEFAULT);

if (password_verify("mypassword123", $hash)) {
  echo "You are logged in!";
} else {
  echo "Wrong password!";
}
  */
///////////////////////////////////////

///////////////////////////////////////
/*
// $_SERVER
// foreach ($_SERVER as $key => $value) {
//   echo "{$key} = {$value} . <br>";
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "HELLO";
}
*/
///////////////////////////////////////

///////////////////////////////////////
/*
// $_SESSION
if (isset($_POST["login"])) {
  if (
    !empty($_POST["email"]) &&
    !empty($_POST["password"])
  ) {
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"] = $_POST["password"];

    header("Location: home.php");
  } else echo "Wrong email or password!";
}
*/
////////////////////////////////////////

////////////////////////////////////////
/*
// COOKIES:
setcookie("fav_food", "Jogurt", time() + (86400 * 2));
setcookie("fav_drink", "coffe", time() + (86400 * 3));
setcookie("fav_dessert", "Madovnik", time() + (86400 * 4));

foreach ($_COOKIE as $key => $value) {
  echo "{$key} = {$value}<br>";
}
*/
//////////////////////////////////////

// include("footer.html")
//////////////////////////////////////
/*
// VALIDATE AND SANITISE INPUT

if (isset($_POST["login"])) {
  $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
  echo $username;
  //$age = filter_input(INPUT_POST, "username", FILTER_SANITIZE_NUMBER_INT);
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  //echo $email;

  //$age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
  $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
  if (empty($email)) {
    echo "Your email isn't valid!";
  } else {
    echo $email;
  }
}
*/
//////////////////////////////////////

//////////////////////////////////////
/*
// String functions:
$username = "Optimus Prime";

//$username = strtolower($username);
//$username = strtoupper($username);
$username = trim($username);
$username = str_pad($username, 20, "0");
$username = str_replace("0", "", $username);
//$username = strrev($username);
//$username = str_shuffle($username);
//$username = strcmp($username, "Optimus Prime");
$count = strlen($username);
$index = strpos($username, ' ');
$firstName = substr($username, 0, 3);
$lastName = strpos($username, 4);
$fullName = explode(" ", $username);
$username = implode("-", $fullName);



echo $username . "<br>";
//echo $index;
//print($username);

foreach ($fullName as $name) {
  echo $name . "<br>";
}
*/
//////////////////////////////////////

//////////////////////////////////////
/*
// Functions:
function hypotenuse($a, $b)
{
  $c = sqrt($a ** 2 + $b ** 2);
  return $c;
}

echo hypotenuse(2, 4);
*/
//////////////////////////////////////

//////////////////////////////////////
/*
// Checkbox
if (isset($_POST["confirm"])) {
  $foods = $_POST["foods"];
  foreach ($foods as $food) {
    echo $food . "<br>";
  }
}
*/
/////////////////////////////////////


/////////////////////////////////////
/*
// Radio button:

if (isset($_POST["confirm"])) {
  if (isset($_POST["credit_card"])) {
    $credit_card = $_POST["credit_card"];
    echo $credit_card;
  } else {
    echo "Please make a selection";
  }
}
*/
//////////////////////////////////////

/////////////////////////////////////////
/*
// empty() & isset()
foreach ($_POST as $key => $value) {
  echo "{$key} = {$value}<br>";
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if (empty($username)) {
    echo "Not valid username";
  } elseif (empty($password)) {
    echo "Wrong password";
  } else
    echo "Hello $username";
}
*/

// $users = array("Tony" => 28, "John" => 32);
// $user = $users[$_GET["username"]];;
// echo "Hello {$_GET["username"]}";


// foreach ($users as $key => $value) {
//   echo "{$key} {$value} <br>";
// }
//////////////////////////
/*
// Associative array:
$capitals = array(
  "USA" => "Washington",
  "Japan" => "Tokyo",
  "South Korea" => "Seoul",
  "India" => "New Delhi"
);

$capitalsNew = [
  "USA" => "Washington",
  "Japan" => "Tokyo",
  "South Korea" => "Seoul",
  "India" => "New Delhi"
];



$capital = $capitals[$_GET["country"]];
echo $capital;



// $capitals["USA"] = "Las Vegas";
// $capitals["China"] = "Beijing";
// array_pop($capitals);
// array_shift($capitals);
// $keys = array_keys($capitals);
// $values = array_values($capitals);
// $capitals = array_flip($capitals);
// $capitals = array_reverse($capitals);
// echo count($capitals) . "<br>";

// foreach ($capitals as $key => $value) {
//   echo "{$key} - {$value} <br>";
// }
*/
//////////////////////////////////////////

// Arrays:
/*
$foods = array("apples", "oranges", "banana", "coconut"); // older syntax
$cars = ["Fiat", "Ford", "Volvo"]; // newer syntax
$carsAsoc = ["Fiat" => "Italian", "Ford" => "American", "Volvo" => "Swedish"]; // newer syntax
$cars[] = "Skoda";
echo $carsAsoc["Fiat"] . "<br>";

foreach ($cars as $car) {
  echo $car . "<br>";
}
// echo $foods[0] . "<br>";
// echo $foods[1] . "<br>";
// echo $foods[2] . "<br>";
// echo $foods[3] . "<br>";

//array_push($foods, "pineapple");
//array_pop($foods);
//array_shift($foods);
//array_unshift($foods, "pineapple");
//$foods = array_reverse($foods);
echo count($foods) . "<br>";


foreach ($foods as $food) {
  echo $food . "<br>";
}
*/
////////////////////////////

////////////////////////////
/*
// While loop:
$counter = 0;

while ($counter < 11) {
  $counter++;
  echo $counter . "<br>";
}

/////////////////////////////

/////////////////////////////
/*
// For loop:
for ($i = 0; $i <= 10; $i++) {
  echo $i . "<br>";
}
*/
/////////////////////////////////

/////////////////////////////////
/*
// Switches:

$date = date("l");
echo "{$date}<br>";

switch ($date) {
  case "Monday":
    echo "Only task is - programming today";
    break;
  case "Tuesday":
    echo "Today tasks are - programming and workout";
    break;
  case "Wednesday":
    echo "Only task is - programming today";
    break;
  case "Thursday":
    echo "Today tasks are - programming and workout";
    break;
  case "Friday":
    echo "Only task is - programming today";
    break;
  case "Saturday":
    echo "Only task is - programming today";
    break;
  case "Sunday":
    echo "Today tasks are - programming and workout";
    break;
}
*/


// Logical operators:
// && - AND
// || - OR
// ! - NOT



//////////////////////////////////////
/*
// If else statement:
$age = $_POST["age"];
if ($age >= 18) {
  echo "You can enter the site";
} else if ($age == 0 || $age == " " || $age == "" || $age == -1) {
  echo "Please enter valid number";
} else {
  echo "You can't enter";
}
*/
/////////////////////////////////

/////////////////////////////////
/*

// Exercise:
$radius = $_POST['radius'];


$circumference = round(2 * pi() * $radius, 2);
$area = round(pi() * pow($radius, 2), 2);
$diametr = 2 * $radius;
echo "Area is: {$area}<br>";
echo "Circumference is: {$circumference}<br>";
echo "Diametr is: {$diametr}";

// Math functions
$x = $_POST["x"];
$y = $_POST["y"];
$z = $_POST["z"];
$total = null;

// $total = abs($x);
// $total = round($x);
// $total = floor($x);
// $total = ceil($x);
// $total = sqrt($x);
// $total = pow($x, $y);
// $total = max($x, $y, $z);
// $total = min($x, $y, $z);
// $total = pi();
// $total = rand();
$total = rand(1, 6); // Roll dice

echo $total;
*/
////////////////////////////////////////

//////////////////////////////////////
// GET and POST super global variables:
/*
//$food = $_POST["food"];
//$quantity = $_POST["quantity"];

$food = "pizza";

if ($food == "pizza") {
  $price = 5;
} else echo "Make your order!";

$quantity = 3;

$quintity = null;
$total = $price * $quantity;
echo "Your order is $quantity $food's and total is: $$total";

// echo $_POST["username"] . "<br>";
// echo "{$_POST["password"]}<br>";
*/
///////////////////////////////////////

//////////////////////////////////////
/*
// Strings
$name = "Artur ";
$food = "Pizza";
$email = "myfakeemail@gmail.com";

// Integers
$age = 25;
$users = 2;
$quintity = 4;

// Floating points:
$height = 1.82;
$weight = 84.7;
$price = 8.99;

// Booleans
$employed = true;
$online = false;

$total = null;

$total = $quintity * $price;
echo "\${$total}";
*/
?>