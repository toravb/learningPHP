<?php
/*
 * 1) всегда юзай вместое include - required_once. это одно и то же, только если ты в своей проге уже
 * подключал этот файл - будет ошибка при иклюд, а при  required_once он просто не будет подключать ещё раз. (manual если не понял)
 * 2) никогда не передавай формы по регистрации/ авторизации через GET. всегда через POST. безопасность на счету
 */
include('includes/db.php');
?>

<form method="GET" action="/reg.php">
    <input type="text" placeholder="Ваше имя" name="name" required>
    <input type="text" placeholder="Ваша фамилия" name="s_name" required>
    <input type="number" placeholder="Ваш возраст" name="age" required>
    <hr>
    <input type="email" placeholder="Ваша почта" name="email" required>
    <hr>
    <input type="text" placeholder="Ваш логин" name="login" required>
    <input type="password" placeholder="Ваш пароль" name="password" required>
    <input type="password" placeholder="Подтвердите пароль" name="confirm_password" required>
    <hr>
    <input type="submit" value="Зарегистрироваться">
</form>
<form action="/login_index.php">
    <button>Я уже зарегистрирован</button>
</form>
<?php
$con = null;
?>
