<?php
class User {
    private $login;
    private $password;

    public function __construct($login, $password) {
        $this->login = $login;
        $this->password = $password;
    }

    public function getLogin() {
        return $this->login;
    }
}

final class Admin extends User {
    private $rights;

    public function __construct($login, $password, $rights) {
        parent::__construct($login, $password);
        $this->rights = $rights;
    }

    public function getRights() {
        return $this->rights;
    }

    public function setRights($rights) {
        $this->rights = $rights;
    }
}



$admin = new Admin('admin', 'veryLongAndDifficultPassword', 1);
echo $admin->getLogin(); // admin


$admin = new Admin('admin', 'veryLongAndDifficultPassword', 1);
var_dump($admin instanceof Admin); // bool(true)

$user = new User('true-coder', 'qwerty');
var_dump($admin instanceof User); // bool(true)

var_dump($user instanceof User); // bool(true)

var_dump($user instanceof Admin); // bool(false)





//////Полиморфизм
class Animal {
    public function eat() {
        //...
    }
}

class Monkey extends Animal {
}

class Crocodile extends Animal {
}

class Elephant extends Animal {
}
//Теперь можно покормить хоть целый массив животных, только нужно убедиться, что мы кормим именно животное.
$animals = array (
    new Monkey(),
    new Monkey(),
    new Monkey(),
    new Elephant(),
    new Crocodile(),
    new Elephant(),
);

foreach ($animals as $animal) {
    // Убеждаемся что это животное
    if ($animal instanceof Animal) {
        $animal->eat();
    }
}


Class Singleton{
    private static $instance;
    private function __construct(){

    }
    public static function createInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Singleton();
            return self::$instance;
        }
        else{
            return self::$instance;
        }
    }
}
$Singleton = new Singleton();
Singleton::createInstance();