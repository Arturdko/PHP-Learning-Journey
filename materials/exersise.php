<?php
// 🧩 ЗАДАНИЕ: Управление зоопарком:
print "
<hr><br>------🧩 ЗАДАНИЕ 1: Управление зоопарком:--------------<br>
<hr>";

// 📋 Требования:
// 1. Интерфейс AnimalBehavior
// Должен содержать метод makeSound().
interface AnimalBahavior
{
  public function makeSound();
}


// 2. Абстрактный класс Animal
// Свойства: name, age, species
abstract class Animal
{
  public $name;
  public $age;
  public $species;

  // Статическое свойство $count — общее количество животных
  public static $count = 0;

  // Новое свойство $favoriteFood в Animal
  public $favoriteFood;
  // Устанавливается в конструкторе.

  // Используется в методе feed().
  // Метод __construct($name, $age, $species)
  public function __construct(string $name, int $age, string $species, string $favoriteFood)
  {
    $this->name = $name;
    $this->age = $age;
    $this->species = $species;
    $this->favoriteFood = $favoriteFood;
    self::$count++;
  }
  // Абстрактный метод move()
  abstract public function move();

  // 1. Абстрактный метод feed() в Animal
  // Каждое животное должно по-своему реагировать на кормёжку.
  abstract public function feed();

  // Метод info() — выводит информацию о животном
  public function info()
  {
    echo "$this->name is $this->species and is $this->age years old<br>";
  }

  // Статический метод getCount()
  public static function getCount()
  {
    echo "Total animals in ZOO: " . self::$count . "<br>";
  }

  // Метод __destruct() — уменьшает счётчик при удалении животного
  public function __destruct()
  {
    self::$count--;
  }
}


// 3. Трейт Logger
// Метод log($message) — выводит сообщение вида [LOG]: сообщение
trait Logger
{
  public function log()
  {
    echo ($this->name . "is eating" . $this->favoriteFood . "<br>");
  }
}

interface Carnivore
{
  public function hunt();
}


// 4. Классы-наследники
// Создай минимум 2 класса, наследующих Animal и реализующих интерфейс AnimalBehavior, например:
// Оба класса должны использовать трейты и переопределить методы move() и makeSound().

// Eagle
class Eagle extends Animal implements AnimalBahavior
{
  use Logger;

  public function move()
  {
    echo "Eagle flies<br>";
  }

  public function makeSound()
  {
    echo "Eagle make ee<br>";
  }

  public function feed()
  {
    echo "I like to eat: $this->favoriteFood <br>";
  }
}


// Lion
class Lion extends Animal implements AnimalBahavior, Carnivore
{
  use Logger;
  public function move()
  {
    echo "Lion runs<br>";
  }

  public function makeSound()
  {
    echo "Lion roars<br>";
  }

  public function feed()
  {
    echo "I like to eat: $this->favoriteFood<br>";
  }

  public function hunt()
  {
    echo "I like to hunt zebras<br>";
  }
}

// Dog
class Dog extends Animal implements AnimalBahavior
{
  use Logger;
  public function move()
  {
    echo "Dog runs<br>";
  }

  public function makeSound()
  {
    echo "Dog burks<br>";
  }

  public function feed()
  {
    echo "I like to eat: $this->favoriteFood <br>";
  }
}

// Elephant
class Elephant extends Animal implements AnimalBahavior
{
  use Logger;
  public function move()
  {
    echo "Elephant runs<br>";
  }

  public function makeSound()
  {
    echo "Elephant el  i  fuhnt<br>";
  }

  public function feed()
  {
    echo "I like to eat: $this->favoriteFood <br>";
  }
}

// Cat

class Cat extends Animal implements AnimalBahavior, Carnivore
{
  use Logger;
  public function move()
  {
    echo "Cat runs<br>";
  }

  public function makeSound()
  {
    echo "Cat Meaw <br>";
  }

  public function feed()
  {
    echo "I like to eat: $this->favoriteFood <br>";
  }

  public function hunt()
  {
    echo "I like to hunt zebras<br>";
  }
}

// Penguin

class Penguin extends Animal implements AnimalBahavior
{
  use Logger;
  public function move()
  {
    echo "Penguin swims<br>";
  }

  public function makeSound()
  {
    echo "Penguin crowls <br>";
  }

  public function feed()
  {
    echo "I like to eat: $this->favoriteFood <br>";
  }
}

// Tiger

class Tiger extends Animal implements AnimalBahavior, Carnivore
{
  use Logger;
  public function move()
  {
    echo "Tiger runs<br>";
  }

  public function makeSound()
  {
    echo "Tiger roars <br>";
  }

  public function feed()
  {
    echo "I like to eat: $this->favoriteFood <br>";
  }

  public function hunt()
  {
    echo "I like to hunt zebras<br>";
  }
}

// Monkey

class Monkey extends Animal implements AnimalBahavior
{
  use Logger;
  public function move()
  {
    echo "Monkey runs<br>";
  }

  public function makeSound()
  {
    echo "Monkey crowls <br>";
  }

  public function feed()
  {
    echo "I like to eat: $this->favoriteFood <br>";
  }
}

// 5. Тестирование
// Создай несколько объектов разных животных
$lion = new Lion("Simba", 10, "Lion", "zebra");
$eagle = new Eagle("Wind", 7, "Golden Eagle", "mouse");
$dog = new Eagle("Sharik", 6, "Golden Retriever", "chappy");
$elephant = new Elephant("Biggy", 16, "Elephant", "grass");


// Вызови методы move(), makeSound() и info() для каждого
$lion->move();
$lion->makeSound();
$lion->info();
$lion->feed();
$lion->log();


$eagle->move();
$eagle->makeSound();
$eagle->info();
$eagle->feed();
$eagle->log();

$dog->move();
$dog->makeSound();
$dog->info();
$dog->feed();
$dog->log();

$elephant->move();
$elephant->makeSound();
$elephant->info();
$elephant->feed();
$elephant->log();
// Покажи общее количество животных через Animal::getCount()
Animal::getCount();

// Удали один объект и снова выведи количество
unset($dog);
Animal::getCount();
// 💡 Подсказка:
// Твоя задача — самостоятельно объединить всё, что ты уже изучил:

// интерфейсы

// абстрактные классы

// конструкторы и деструкторы

// трейты

// полиморфизм

// статические методы и свойства


//🧩 ЗАДАНИЕ: Животные в действии — еда, поведение, учёт!

// ✅ Что нужно реализовать:


// 5. Массив с животными
// Создай массив с 4-5 животными (разных видов). Пройди по массиву циклом:

$animals = [
  "Cat" => new Cat("Simon", 3, "Cat", "Phelix"),
  "Penguin" => new Penguin("Eric", 11, "Penguin", "fish"),
  "Tiger" => new Tiger("Sharchan", 8, "Tiger", "horse"),
  "Monket" => new Monkey("Abbu", 5, "Monkey", "banana")
];



foreach ($animals as $animal => $object) {
  echo "---" . $animal . "---" . "<br>";
  $object->info();
  $object->move();
  $object->makeSound();
  $object->feed();

  if ($object instanceof Carnivore) {
    $object->hunt();
  }
}
