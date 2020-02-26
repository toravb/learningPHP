<?php
include('includes/db.php');
//объявляю переменные для получения введенных данных из форм
$u_name = $_GET['name'];
$s_name = $_GET['s_name'];
$age = $_GET['age'];
$email = $_GET['email'];
$login = $_GET['login'];
$password = $_GET['password'];
$c_password = $_GET['confirm_password'];
//подготавливаю запросы для поиска логина или email в бд
$count_login = $connect ->prepare("SELECT * FROM username WHERE login = :login");
$count_login->bindValue(':login', $login, PDO::PARAM_STR);
$count_login->execute();
$count_email = $connect ->prepare("SELECT * FROM users WHERE email = :email");
$count_email->bindValue(':email', $email, PDO::PARAM_STR);
$count_email->execute();
//вывод ошибок, если логин или email уже существует в бд, или если логин содержит спец. символы. Ограничение по длине логина и пароля, "ограничение возраста"
if(!preg_match("/^[a-zA-Z0-9]+$/",$login))
{
    echo 'Логин может состоять только из букв английского алфавита и цифр<br/>';
    exit();
}elseif(strlen($login) < 3 or strlen($login) > 16)
{
    echo 'Логин должен быть не меньше 3-х символов и не больше 16<br/>';
    exit();
}
if(strlen($password) > 32 or strlen($password) < 7){
    echo 'Пароль должен содержать от 7 до 32 двух символов<br/>';
    exit();
}if($age > 120 or $age <5){
    echo 'Пожалуйста, укажите корректный возраст<br/>';
    exit();
}
if($count_login->rowCount() == 1){
    echo 'Логин занят<br/>';
    exit();
}elseif ($count_email->rowCount() == 1){
    echo 'Указанный email используется<br/>';
    exit();
}elseif ($password != $c_password){
    echo 'Пароли не совпадают<br/>';
    exit();
}//если почты и логина нет в бд, тогда отправляю запрос на добавление данных пользователя, а также его логина и пароля в бд
else {
    $reg = $connect->prepare("INSERT INTO `users`(`name`, `s_name`, `age`, `email`, `login`) VALUES (:u_name, :s_name, :age, :email, :login); INSERT INTO `username`(`login`, `password`) VALUES (:login, :password)");
    $reg->bindValue(':u_name', $u_name, PDO::PARAM_STR);
    $reg->bindValue(':s_name', $s_name, PDO::PARAM_STR);
    $reg->bindValue(':age', $age, PDO::PARAM_STR);
    $reg->bindValue(':email', $email, PDO::PARAM_STR);
    $reg->bindValue(':login', $login, PDO::PARAM_STR);
    $reg->bindValue(':password', $password, PDO::PARAM_STR);
    $reg->execute();
    echo 'Поздравляем с регистрацией! Используйте свой логин и пароль для входа<br/>';
    exit();
}
?>
<?php
$con = null;
?>
