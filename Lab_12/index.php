<html>
<head>
<title> Математичний приклад</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

<?php
if (!isset($_POST['name'])) {
    show_form();
}
else {
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mail_index = $_POST["mail_index"];
    $favorite_subject = $_POST["favorite_subject"];
    send($name, $last_name, $email, $mail_index, $favorite_subject);
}


function show_form() {
    ?>
    <h2>Будь ласка, введіть інформацію про себе</h2>
    <h4>Поля з * обов'язкові для заповнення<h4>
    <div class="col md6">
    <form action="index.php" method="post">
    Ім'я: <br>
    <input name="name" type="text"> <br>
    Прізвище*: <br>
    <input name="last_name" type="text"> <br>
    Email*: <br>
    <input name="email" type="text"> <br>
    Поштовий індекс*: <br>
    <input name="mail_index" type="text"> <br>
    Улюблений предмет: <br>
    <input name="favorite_subject" type="text"> <br>
    <input name="submit" type="submit" value="Розрахувати">
    </form>
    </div>
    <?php
}

function send($name, $last_name, $email, $mail_index, $favorite_subject) {
    if (validate_and_print($last_name, $email, $mail_index)) {
        echo "<h1>Дякуємо! Слідуюча інформація була успішно відправлена:</h1>";
        echo "<h1> Контактна інформація </h1>";
        echo "<div>
        <h2>{$name}</h2>
        <h2>{$last_name}</h2><h2>{$email}</h2><h2>{$mail_index}</h2><h2>{$favorite_subject}</h2>";
    }
    else {
        show_form();
    }
}

function validate_and_print($last_name, $email, $mail_index) {
    $validationStatus = true;
    if (!is_mail_index_valid($mail_index)) {
        $validationStatus = false;
        echo "<h3>Введіть поштовий індекс</h3>";
    }
    if (!is_email_valid($email)) {
        $validationStatus = false;
        echo "<h3>Введіть Email</h3>";
    }
    if (!is_last_name_valid($last_name)) {
        $validationStatus = false;
        echo "<h3>Введіть Прізвище</h3>";
    }
    return $validationStatus;
}

function is_mail_index_valid($mail_index) {
    return is_str_valid($mail_index);
}

function is_email_valid($email) {
    return is_str_valid($email);
}

function is_last_name_valid($last_name) {
    return is_str_valid($last_name);
}

function is_str_valid($s) {
    return $s != NULL && $s != "";
}
?> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html> 
