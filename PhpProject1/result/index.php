<?php

require_once('config.php');
require_once('functions.php');

if (!empty($_GET['action'])) {
    switch ($_GET['action']) {
        case 'update':
            if (!empty($_POST) && !empty($_GET['id'])) {
                updateNews($_GET['id'], $_POST['title'], $_POST['text']);
            } else {
                if (!empty($_GET['id'])) {
                    showNewsForm(true);
                } else
                    echo 'Ошибка! Не указан идентификатор новости';
            }
            break;
        case 'insert':
            if (!empty($_POST)) {
                insertNews($_POST['title'], $_POST['text']);
            } else {
                showNewsForm(false);
            }
            break;
        default: break; //иначе ничего не делаем :)
    }
}

showNewsList();
