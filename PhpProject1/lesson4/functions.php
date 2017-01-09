<?php
/*
 * Повторяющиеся куски кода выделим логически
 * в отдельные функции и вынесем в этот файл
 */

session_start();
//подключение к базе также вынесем сюда
$link = mysqli_connect($hostname, $user, $pass, $db)
or die("Не могу подключиться к базе данных! Причина:".mysqli_error($link));

//установим принудительно кодировку для работы с БД
//чтобы не приходили знаки "???"
mysqli_query($link, "set names 'utf8'");

/*
 * Функция получения и вывода
 * списка новостей
 */
function showNewsList(){
    global $link; //разрешаем доступ к переменной внутри функции
    $sql = "SELECT * FROM `news`"; //конструируем запрос
    $result = mysqli_query($link, $sql); //получаем результаты
    //обрабатываем результаты
    while($row = mysqli_fetch_array($result)){
        //выводим список, по клику передаем action update
        echo '<a href="?action=update&id='.$row['id'].'">'.$row['title'].'</a><br/>';
    }
    //добавляем ссылку с action insert для функционала добавления
    echo '<br/><a href="?action=insert">Добавить новость</a>';
}


/*
 * Функция добавления новой новости
 */
function insertNews($title, $description=''){
    global $link;
    $sql = "INSERT INTO `news` (`title`, `description`, `datetime`)
    VALUES ('{$title}','{$description}', NOW())";
    if(mysqli_query($link, $sql)){
        //mysql_query возвращает true в случае успеха вставки записи
        echo 'Ваша новость успешно добавлена!<br/>';
    }
    else{
        echo 'Ошибка при выполнении запроса добавления новости<br/>';
    }
}
/*
 * Функция обновления новости
 * id - идентификатор новости (обязательно)
 * title - название новости (обязательно)
 * $text - текст новости (не обязательно)
 */
function updateNews($id, $title, $text = ''){
    global $link;
    //если id > 0 и заголовок не пуст, делаем запрос
    if(intval($id) > 0 && !empty($title)){
        $sql = "UPDATE `news` SET
            `title` = '{$title}',
            `description` = '{$text}'
          WHERE `id` = {$id}";
        //делаем запрос, и пишем статус
        if(mysqli_query($link, $sql)){
            echo 'Ваша новость успешно обновлена!<br/>';
        }
        else{
            echo 'Ошибка обновления новости!<br/>';
        }
    }
    else echo 'Указан пустой заголовок или неверная ссылка';
}

/*
 * Функция вывода формы добавления/обновления новости
 * $isUpdate = false - форма добавления новости
 * true - форма обновления
 */
function showNewsForm($isUpdate, $title=null, $text=null){
    global $link;
    //если форма обновления новости, запрашиваем данные по новости
    // и заполняем поля предыдущими значениями
    if($isUpdate){
        $sql = "SELECT * FROM `news` WHERE `id` = {$_GET['id']}";

        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_row($result);

        echo '<form action="?action=update&id='.$_GET['id'].'" method="post">
    <label>Заголовок</label><input type="text" name="title" value="'.$row[1].'"/><br/>
    <label>Текст новости</label><textarea name="description">'.$row[2].'</textarea><br/>
    <input type="submit" value="Обновить">
</form>';
    }
    else{
        echo '<form action="?action=insert" method="post">
    <label>Заголовок</label><input type="text" name="title" /><br/>
    <label>Текст новости</label><textarea name="description"></textarea><br/>
    <input type="submit" value="Добавить">
</form>';
    }
}

function loginUser($login, $password){
    global $link; //разрешаем доступ к переменной внутри функции
    $password=md5($password);
    $sql = "SELECT * FROM `users` WHERE
        `login` = '{$login}' and
        `password` = '{$password}'"; //конструируем запрос
    $result = mysqli_query($link, $sql); //получаем результаты
    $user = mysqli_fetch_row($result);
    if(!is_null($user)){
        $_SESSION['user'] = $user;
        header("Refresh: 0; url=index.php");
    }
    else{
        echo 'Неверный логин или пароль!';
    }
}
function registerUser($login, $pass, $confirm){
    global $link;
    //TODO: проверка логина на занятость
    if($pass==$confirm){
       $password = md5($pass);
        //добавить проверку нет ли уже такого пользователя
        $sql = "INSERT INTO `users` (`login`, `password`)
    VALUES ('{$login}','{$password}')";
        if(mysqli_query($link, $sql)){
            //mysql_query возвращает true в случае успеха вставки записи
            echo 'Вы успешно зарегистрировались!<br/>';
        }
        else{
            echo 'Ошибка при выполнении запроса добавления новости<br/>';
        }
    }
    else{
        echo 'Все плохо';
    }

}

function showRegForm(){
    echo '<form action="?action=register" method="post">
    <label>Логин (*)</label><input type="text" name="login" /><br/>
    <label>Пароль</label><input type="password" name="password" /><br/>
    <label>Подтверждение</label><input type="password" name="confirm_password" /><br/>
    <input type="submit" value="Зарегистрироваться">
</form>';
}

function showLoginForm(){
    echo '<form action="?action=login" method="post">
    <label>Логин (*)</label><input type="text" name="login" /><br/>
    <label>Пароль(*)</label><input type="password" name="password" /><br/>
    <input type="submit" value="Войти"><br/>
    <a href="?action=register">Регистрация</a>
</form>';
}

function isUserLoggedIn(){
    if(!empty($_SESSION['user'][1])){
        return true;
    }
    else return false;
}

function logoutUser(){
    session_destroy();
    $_SESSION = array();
    header("Refresh: 0; url=index.php");
}
