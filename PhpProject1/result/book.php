<?php

require_once('config.php');
require_once('functions.php');

// Выполняем SQL-запрос
$query = 'SELECT * FROM guest_book';
$result = mysqli_query($link,$query) or die('Запрос не удался: ' . mysql_error());

// Выводим результаты в html
echo "<table border='2'>\n";
while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Освобождаем память от результата
mysqli_free_result($result);

// Закрываем соединение
mysqli_close($link);
?>