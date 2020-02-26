<?php
/*
 * 1)сразу бросается в глаза - используй табуляцию. код не читается. всё должно быть структуризировано как в HTML тегах
 * 2) host, dbname, root, password лучше вынести в отдельные переменные и отделить их ентерами чтобы лучше читалосьи было понятно,
 * что это настройки
 * 3) лишни и слишком очевидные комментарии не нужны. и так понятно по названию файла, что это файл для БД
 */

    $host = '127.0.0.1';
    $dbName = 'test_db';
    $user = 'root';
    $password = '';

    try
    {
        // обрати внимание, что можно юзать такой синтаксис :)
        $connect = new PDO("mysql:host={$host};dbname={$dbName}", $user, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo 'ERROR: ' . $e->getMessage();
        exit();
    }