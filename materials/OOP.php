<?php
// 1️⃣ Классы и объекты
// Кратко: Класс — это шаблон, объект — это экземпляр этого шаблона.

// создаём класс с именем Car
class Car1
{
  public $color;     // это свойство (переменная внутри класса)
  public $brand;     // ещё одно свойство

  public function drive()
  { // метод (функция внутри класса)
    echo "The car is driving\n";
  }
}

// создаём объект (экземпляр) класса Car
$myCar = new Car1();

// устанавливаем значения свойств
$myCar->color = "red";
$myCar->brand = "Toyota";

// выводим данные
echo "My car is a " . $myCar->color . " " . $myCar->brand . "\n";

// вызываем метод
$myCar->drive();




class Dog1
{
  public $name;

  public function bark()
  {
    echo "Woof!\n";
  }
}

$dog = new Dog1();
$dog->name = "Rex";
echo $dog->name . " says: ";
$dog->bark();

// 📝 Попробуй сам: создай класс Person с полем $name и методом sayHello(), который выводит "Hello, my name is NAME".

class Person
{
  public $name;

  public function sayHello()
  {
    echo "<br>Hello, my name is $this->name<br>";
  }
}

$person = new Person;
$person->name = 'Artur';
$person->sayHello();
var_dump($person);

// 2️⃣ Конструктор (__construct)
// Кратко: Метод, который вызывается при создании объекта.

class UserConstr
{
  public $username;

  public function __construct($name)
  {
    $this->username = $name;
  }

  public function greet()
  {
    echo "Hello, " . $this->username . "!\n";
  }
}

$user = new UserConstr("Alice");
$user->greet();


// 📝 Сделай класс Book с полями title и author, передавай их в конструкторе.

class Book
{
  public $title;
  public $author;

  public function __construct($title, $author)
  {
    $this->title = $title;
    $this->author = $author;
  }

  public function whole_name()
  {
    echo "You are reading " . $this->title . " by " . $this->author . "<br>";
  }
}

$book = new Book("1984", "Jorge Oruel");
$book->whole_name();


// 3️⃣ Наследование (extends)
// Кратко: Один класс может "наследовать" другой и брать его свойства и методы.

class Animaly
{
  public function makeSound()
  {
    echo "Some generic sound\n";
  }
}

class Cat extends Animaly
{
  public function makeSound()
  {
    echo "Meow\n";
  }
}

$cat = new Cat();
$cat->makeSound(); // Meow


// 📝 Сделай базовый класс Employee и дочерний Manager, который добавляет метод approveLeave().

class Employee
{
  public $name;

  public function __construct($name)
  {
    $this->name = $name;
  }
  public function go_on_vacation()
  {
    echo "$this->name can go";
  }
}


class Manager extends Employee
{
  public function go_on_vacation()
  {
    echo "You have my approvement.";
  }
}

$employee = new Manager("Jack");
$employee->go_on_vacation();


// 4️⃣ Инкапсуляция (модификаторы доступа)
// Кратко: Управление доступом к свойствам/методам.

// public — доступен всем

// private — доступен только внутри класса

// protected — доступен в классе и подклассах


class BankAccount
{
  private $balance = 0;

  public function deposit($amount)
  {
    $this->balance += $amount;
  }

  public function getBalance()
  {
    return $this->balance;
  }
}

$acc = new BankAccount();
$acc->deposit(1000);
echo $acc->getBalance(); // 1000

// 📝 Попробуй сделать свой класс Wallet с приватным балансом и методами addMoney() и getBalance().

class Wallet
{
  private $balance = 0;

  public function addMoney($summ)
  {
    $this->balance += $summ;
  }

  public function getBalance()
  {
    return $this->balance . " EUR";
  }
}

$my_wallet = new Wallet();
$my_wallet->addMoney(31245);
echo "<br>" . $my_wallet->getBalance();
unset($my_wallet);
//echo "<br>" . $my_wallet->getBalance();


// __construct() and __destruct()

class Test
{
  // __construct() может принимать параметры и выполнять инициализацию.
  public function __construct()
  {
    $mess = "THIS MESSAGE IS FROM __CONSTRUCT FUNCTION!!!";
    return $mess;
  }

  // __destruct() не принимает параметры и вызывается автоматически.
  public function __destruct()
  {
    echo "THIS MESSAGE IS FROM __DESTRUCT FUNCTION!!!💥";
  }
}

//$test = new Test();
//echo $test->__construct();
// ⚠️ Почему не стоит так делать:
// __construct() — это специальный метод, предназначенный для автоматического запуска при создании объекта. Ручной вызов может запутать структуру программы и привести к ошибкам, особенно если ты уже создал объект.


class Counter
{
  public static $count = 0;

  public function __construct()
  {
    self::$count++; // увеличиваем статическое свойство
  }

  public static function getCount()
  {
    echo "<br>Total objects: " . self::$count . "\n";
  }
}

$first = new Counter();
$second = new Counter();

Counter::getCount(); // Выведет: Total objects: 2


// Попробуй создать класс User с static свойством $userCount, которое увеличивается в конструкторе.

class Userss
{
  public static $userCount = 0;

  public function __construct()
  {
    self::$userCount++;
  }
  public static function getUsers()
  {
    echo "Total users: " . self::$userCount . "<br>";
  }
}

$user1 = new Userss();
$user2 = new Userss();
$user3 = new Userss();
$user4 = new Userss();

Userss::getUsers(); // 4


class Converter
{
  public static function celsiusToFahrenheit($celsius)
  {
    return $celsius * 1.8 + 32;
  }

  public static function sum($a, $b)
  {
    return $a + $b;
  }
}

echo Converter::celsiusToFahrenheit(25) . "\n"; // 77
echo Converter::sum(10, 15);                    // 25


// Попробуй создать класс StringHelper с static методом greet($name), который будет возвращать "Hello, <имя>!".

class StringHelper
{
  public static function greet($name)
  {
    echo "Hello " . $name . '!';
  }
}

StringHelper::greet("Artur");

// 
// 🔷 1. Интерфейсы (interface)
// 📘 Интерфейс — это набор методов без реализации, как "контракт".
// Класс, который реализует интерфейс, обязан реализовать все его методы.

// | Интерфейс |
// Могут быть свойства? | ❌ Нет | 
// Могут быть методы с телом? | ❌ Нет | 
// Множественная реализация? | ✅ Да (implements) | 
// Используется для | Контракта | 

interface AnimalInterface
{
  public function makeSound();
}

class Dogy implements AnimalInterface
{
  public function makeSound()
  {
    echo "Woof!\n";
  }
}

class Caty implements AnimalInterface
{
  public function makeSound()
  {
    echo "Meow!\n";
  }
}

$dog = new Dogy();
$cat = new Caty();

$dog->makeSound(); // Woof!
$cat->makeSound(); // Meow!


// 🔶 2. Абстрактные классы (abstract class)
// 📘 Абстрактный класс — это полуготовый класс, который может содержать:

// обычные методы с реализацией

// абстрактные методы (без реализации — как в интерфейсе)

// Класс с абстрактными методами нельзя создать напрямую — его надо унаследовать.

// Абстрактный класс
// Могут быть свойства? ✅ Да
// Могут быть методы с телом?✅ Да
// Множественная реализация? ❌ Нет (только один extends)
// Используется для Базового поведения
abstract class Vehicle
{
  public $brand;

  public function __construct($brand)
  {
    $this->brand = $brand;
  }

  abstract public function start(); // абстрактный метод

  public function describe()
  {
    echo "This is a " . $this->brand . "\n";
  }
}



class Car extends Vehicle
{
  public function start()
  {
    echo $this->brand . " is starting...\n";
  }
}


class Car2 extends Vehicle
{
  public function start()
  {
    echo $this->brand . " is starting...\n";
  }
}
$car = new Car("Toyota");
$car->describe(); // This is a Toyota
$car->start();    // Toyota is starting...


// interface Shape с методом getArea() класс Rectangle, который реализует этот интерфейс
interface Shape
{
  public function getArea();
}


class Rectangle implements Shape
{
  public $a;
  public $b;

  public function __construct($a, $b)
  {
    $this->a = $a;
    $this->b = $b;
  }
  public function getArea()
  {
    return $this->a * $this->b;
  }
}

$shape = new Rectangle(2, 2);
echo $shape->getArea(2, 2) . "<br>";

//  🧩 ЗАДАНИЕ: Транспорт
// Создай абстрактный класс Transport, который содержит:

// 🔶 Свойства:
// public $brand

// public $year

// 🔶 Методы:
// __construct($brand, $year) — обычный конструктор

// abstract public function move(); — абстрактный метод

// public function info() — выводит информацию:
// "Brand: <марка>, Year: <год>"

// 🧱 Создай два класса, которые наследуют Transport:
// 1. Car:
// Реализует метод move(), например: echo "The car is driving\n";

// 2. Bicycle:
// Реализует метод move(), например: echo "The bicycle is pedaling\n";

abstract class Transport
{

  public $brand;
  public $year;

  public function __construct(string $brand, int $year)
  {
    $this->year = $year;
    $this->brand = $brand;
  }
  abstract public function move();

  public function info()
  {
    echo "Brand: " . $this->brand . "," . "Year: " . $this->year;
  }
}

class Kara extends Transport
{
  public function move()
  {
    echo "The car is driving\n";
  }
}

class Bicycle extends Transport
{
  public function move()
  {
    echo "The bicycle is pedaling\n";
  }
}

$kara = new Kara("Volvo", 1999);
$bicycle = new Bicycle("Trek", 2020);
echo $kara->move();
echo $kara->info();
echo $bicycle->move();
echo $bicycle->info();


// 🔁 Полиморфизм (многоформенность)
// Полиморфизм — это когда разные классы реализуют один и тот же интерфейс или абстрактный метод, но делают это по-своему.

// То есть: один метод — много реализаций.

interface Animals
{
  public function speak();
}

class Dogs implements Animals
{
  public function speak()
  {
    echo "Woof!\n";
  }
}

class Cats implements Animals
{
  public function speak()
  {
    echo "Meow!\n";
  }
}

function makeAnimalSpeak(Animals $animal)
{
  $animal->speak();
}

$dogs = new Dogs();
$cats = new Cats();

makeAnimalSpeak($dogs); // Woof!
makeAnimalSpeak($cats); // Meow!


// 🧩 Трейты (traits)
// Trait — это как набор методов, который можно "внедрить" в любой класс.

// 📦 Удобно, когда ты хочешь переиспользовать код в нескольких классах, но не можешь использовать наследование (в PHP только одно наследование extends, а трейтов можно сколько угодно).

trait Logger1
{
  public function log($message)
  {
    echo "[LOG]: $message\n";
  }
}

class User
{
  use Logger1;

  public function create()
  {
    $this->log("User created");
  }
}

class Product
{
  use Logger1;

  public function update()
  {
    $this->log("Product updated");
  }
}

$user = new User();
$user->create(); // [LOG]: User created

$product = new Product();
$product->update(); // [LOG]: Product updated
