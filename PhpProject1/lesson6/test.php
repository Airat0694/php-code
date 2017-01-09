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

class SuperAdmin extends Admin{
    public function __construct()
    {
        echo '123';
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

