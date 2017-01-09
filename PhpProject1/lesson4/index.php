<?php
/*
 * Пример 4. Авторизация/регистрация
 */
require_once('config.php'); //подключаем конфиг
require_once('functions.php'); //подключаем функции

//здесь уже наша база готова к работе
//ниже прописываем обработчики get и post запросов

/*
 * сначала проверяем, зашел ли пользователь на сайт
 */
if(isUserLoggedIn()){
    if($_GET['action']==logout){
        logoutUser();
    }
    //если пользователь авторизован, поприветствуем его :)
    echo 'Привет, '.$_SESSION['user'][1].'!';
    var_dump($_SESSION);
    var_dump($_SERVER);
    //TODO: кнопка выхода
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


