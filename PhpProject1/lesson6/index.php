<?php
class ИмяКласса {
    // члены класса
}
$экземплярКласса = new ИмяКласса();
/////////////
class User {
    public $login;
    public $password;

    public function login(){
        echo '123';
    }
    // описание методов класса
}
/////////
class Admin extends User{
    var $login;
    var $password;

    public function login($admin){
        parent::login();
        echo '456';
    }
    // описание методов класса

}
//////////
$user = new User();
$user->login = 'test';
$user->password = 'qwerty';

echo "Логин: $user->login<br />". // Логин: test
    "Пароль: $user->password"; // Пароль: qwerty

//////////
$user = new User();
echo "Логин: ".getType($user->login)."<br />". // Логин: NULL
    "Пароль: ".getType($user->password); // Пароль: NULL
///////
$user = new User();

$propertyName = 'login';
$user->$propertyName = 'test';
$propertyValue = $user->$propertyName;

echo "$propertyName: $propertyValue"; // login: test
///////////
class Point {
    public $x = 0;
    public $y = 0;
    // методы
}

$p = new Point();

echo "x: $p->x<br />". // x: 0
    "y: $p->y"; // y: 0

//////////////
/*
 * Обращение к несуществующему полю (свойству) в PHP
 * не вызывает ошибки и, если присвоить такому
 * полю значение, то оно сохранится в экземпляре объекта.
 *  Такие поля или свойства называют динамически
 * определяемыми.
 */
$p = new Point();
$p->z = 10;
echo "z: $p->z"; // z: 10

/////////
class Rectangle {
    public $width;
    public $height;

    public function getArea() {
        return $this->width * $this->height;
    }
}
//Создадим экземпляр этого класса и вызовем метод getArea:
$rect = new Rectangle();

$rect->width = 15;
$rect->height = 20;

echo $rect->getArea(); // 15 * 20 = 300

//Конструкторы

class Rectangle {
    public $x;
    public $y;
    public $width;
    public $height;

    public function __construct($x, $y, $width, $height) {
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea() {
        return $width * $height;
    }

    public function translateTo($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }
    ///Устаревший вариант
    function Rectangle($x, $y, $width, $height) {
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
    }
}

//Статика
class Klass {
    private static $count = 0;

    public function __construct() {
        self::$count++;
    }

    public static function getCount() {
        return self::$count;
    }
}

$instances = array ();
for ($i = 0; $i < 10; $i++) {
    $instances[] = new Klass();
}

echo "Количество экземпляров класса: ".Klass::getCount()."<br />"; // 10
$instance = new Klass();
echo "Количество после создание ещё одного объекта: ".Klass::getCount(); // 11

//Fatal error: Cannot access private property Klass::$count in …
Klass::$count = -10;



//Константы
class Klass {
    const CONSTANT_NAME = 100500;

    public static function printConstant() {
        echo self::CONSTANT_NAME;
    }
}

Klass::printConstant(); // 100500
Константа так же доступна извне класса:
echo Klass::CONSTANT_NAME; // 100500