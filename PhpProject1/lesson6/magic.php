<?php
class Point {
    private $x;
    private $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function __get($name) {
        echo "Произошло обращение к свойству $name<br />";
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
        echo "Cвойству  $name присвоено значение $value ";
    }
}
//Теперь при каждой попытке изменить значение скрытого или несуществующего свойства будет выводиться соответствующее сообщение.
$p = new Point(8, 16);
$p->x = 10;
$p->y = 20;
$p->z = 30;
/*Результат работы этого скрипта:
Cвойству x присвоено значение 10
Cвойству y присвоено значение 20
Cвойству z присвоено значение 30
*/

//////
class Squere {
    private $side;

    public function __construct($a) {
        $this->side = $a;
    }

    public function __set($name, $value) {
        if ($name == 'area') {
            $this->setArea($value);
        } else if ($name == 'side') {
            $this->side = $valueclass Squere {
                private $side;

                public function __construct($a) {
                    $this->side = $a;
                }

                public function __set($name, $value) {
                    if ($name == 'area') {
                        $this->setArea($value);
                    } else if ($name == 'side') {
                        $this->side = $value;
                    }
                }

                public function __get($name) {
                    if ($name == 'area') {
                        return $this->getArea();
                    } else if ($name == 'side') {
                        return $this->side;
                    }
                }
                private function getArea() {
                    return $this->side * $this->side;
                }

                private function setArea($area) {
                    return $this->side = sqrt($area);
                }
            }
;
        }
    }

    public function __get($name) {
        if ($name == 'area') {
            return $this->getArea();
        } else if ($name == 'side') {
            return $this->side;
        }
    }
    private function getArea() {
        return $this->side * $this->side;
    }

    private function setArea($area) {
        return $this->side = sqrt($area);
    }
}
//Теперь экземпляры этого класса будут вести себя так, словно свойство area присутствует в классе, а свойство side доступно извне.
$squere = new Squere(25);
echo $squere->area; // 25 * 25 = 625


$squere = new Squere(10);
echo $squere->side; // 10
$squere->area = 25;
echo "После изменения площади изменилась и сторона:<br />".
    "$squere->side"; // 5 = sqrt(25)




//Геттеры и сеттеры
class Man {
    private $age;
    private $name;

    public function __construct($name, $age) {
        $this->setAge($age);
        $this->setName($name);
    }

    public function setAge($age) {
        if (is_integer($age) && $age >= 0 && $age < 150) {
            $this->age = $age;
        } else {
            exit ("Некорректный возраст");
        }
    }

    public function setName($name) {
        $name = trim($name);
        if ($name != '') {
            $this->name = $name;
        } else {
            exit ("Некорректное имя");
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }
}
$man = new Man('Jhon Doe', 21);
$man->setAge(-2); // Некорректный возраст. Произойдёт завершение работы скрипта
//реализация через __get && __set
class Man {
    private $age;
    private $name;

    public function __construct($name, $age) {
        $this->age = $age;
        $this->name = $name;
    }

    public function __set($name, $value) {
        if ($name == 'age') {
            if (is_integer($value) && $value >= 0 && $value < 150) {
                $this->age = $value;
            } else {
                exit ("Некорректный возраст");
            }
        } else if ($name == 'name') {
            if ($name != '') {
                $this->name = $name;
            } else {
                exit ("Некорректное имя");
            }
        } else {
            exit ("Неизветное свойство");
        }
    }

    public function __get($name) {
        if ($name == 'age' || $name == 'name') {
            return $this->$name;
        }
        exit('Неизвестное свойство!');
    }
}

echo $man->age; // 21
$man->age = -5; // Некорректный возраст. Произойдёт завершение работы скрипта



public function __toString() {
    return "({$this->x}, {$this->y})";
}
