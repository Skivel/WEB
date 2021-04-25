<?php 
session_start();
echo "<form id='forma' action='script1.php' method='post'> 
<h1>Форма входу</h1> 
<p>Заповніть поля для входу на сайт</p> 
<p>Логін<br/><input type='text' name='login'></p> 
<p>Пароль<br/><input type='password' name='password'></p> 
<p><input type='submit' name='submit' value='Ввійти'> <br></p></form>"
?>
