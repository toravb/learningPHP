<?php
include('includes/db.php');
?>

    <form method="GET" action="/login.php">
        <input type="text" placeholder="Ваш логин" name="login" required>
        <input type="password" placeholder="Ваш пароль" name="password" required>
        <hr>
        <input type="submit" value="Войти">
    </form>
<?php
$con = null;
?>