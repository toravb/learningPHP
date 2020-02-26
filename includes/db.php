<?php
try //connect to db
{
$connect = new PDO('mysql:host=127.0.0.1;dbname=test_db', 'root', '');
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}//catch errors
catch(PDOException $e)
{
echo 'ERROR: ' . $e->getMessage();
exit();
}