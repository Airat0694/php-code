<?php
//Авторизация/регистрация

require_once('config.php'); //подключаем конфиг
require_once('functions.php'); //подключаем функции

/*
 * сначала проверяем, зашел ли пользователь на сайт
 */
if(isUserLoggedIn()){
    if($_GET['action']==logout){
        logoutUser();
    }
    echo 'Привет, '.$_SESSION['user'][1].'!';
    echo '<form action="index.php" method="get">
    <input type="submit" value="Перейти к таблице">
</form>';
    echo '<br/><a href="?action=logout">Выход</a>';
}
else{ //если пользователь не авторизован
    //если action не пустой, проверяем, что передано
    switch($_GET['action']){
        case 'register': //если регистрация
            if(!empty($_POST)){//do register
                registerUser($_POST['login'],
                    $_POST['password'], $_POST['confirm_password']);
            }
            else{
                showRegForm();//выводим форму регистрации
            }
            break;
        case 'login':
            if(!empty($_POST)){
                //выполняем авторизацию
                loginUser($_POST['login'], $_POST['password']);
            }
            else{
                //иначе показываем форму авторизации
                showLoginForm();
            }
            break;
        default:
            showLoginForm();
            break; //в других случаях показываем форму авторизации :)
    }
}


