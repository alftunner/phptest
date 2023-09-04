<?php

/**
 * Функция для вывода содежимого массивов
 * @param array $arr
 * @return void
 */
function showArrInfo(array $arr, bool $die = false) : void
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
    if ($die) {
        die();
    }
}

function showPersonInfo(string $name, int $age = 18, string $surename = 'Не указана') : void
{
    echo "<div>Имя: $name<br>Возраст: $age<br>Фамилия: $surename</div><hr>";
}