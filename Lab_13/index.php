<html>
<head>
<title> Математичний приклад</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

<?php
if (!isset($_POST["discipline"])) {
    show_form();
}
else {
    $discipline = $_POST["discipline"];
    $lectures = $_POST["lectures"];
    $practical = $_POST["practical"];
    $laboratory = $_POST["laboratory"];
    $hours = $_POST["hours"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    
    if (validate($discipline, $email, $phone)) {
        show_result($discipline, $lectures, $practical, $laboratory, $hours, $email, $phone);
    }
}


function show_form() {
    ?>
    <form action="index.php" method="post">
      <p>дисципліна:
        <input class="input-group input-group-sm mb-3" type="text" name="discipline">
      </p>
      <p>кількість лекцій:
        <input class="input-group input-group-sm mb-3" type="text" name="lectures">
      </p>
      <p>кількість практичних:
        <input class="input-group input-group-sm mb-3" type="text" name="practical">
      </p>
      <p>кількість лабораторних:
        <input class="input-group input-group-sm mb-3" type="text" name="laboratory">
      </p>
      <p>загальна кількість годин:
        <input class="input-group input-group-sm mb-3" type="text" name="hours">
      </p>
      <p>електронна адреса:
        <input class="input-group input-group-sm mb-3" type="text" name="email">
      </p>
       <p>номер телефону:
        <input class="input-group input-group-sm mb-3" type="text" name="phone">
      </p>
      <p>
        <input name="submit" type="submit" value="validate">
      </p>
    </form> 
    <?php
}

function validate($discipline, $email, $phone) {
    $status = true;
    if (!is_discipline_valid($discipline)) {
            echo "<h3>Неправильна дисципліна: {$discipline}</h3>";
            $status = false;
    }
    if (!is_email_valid($email)) {
            echo "<h3>Неправильний email: {$email}</h3>";
            $status = false;
    }
    if (!is_phone_valid($phone)) {
            echo "<h3>Неправильний номер: {$phone}</h3>";
            $status = false;
    }
    return $status;
}

function is_phone_valid($phone) {
    $pattern = "/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im";
    return preg_match($pattern, $phone, $match);
}

function is_email_valid($email) {
    $pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    return preg_match($pattern, $email, $match);
}

function is_discipline_valid($discipline) {
    $pattern = "/^[a-z A-Zа-яА-ЯїЇ]*$/";
    return preg_match($pattern, $discipline, $match);
}

function show_result($discipline, $lectures, $practical, $laboratory, $hours, $email, $phone) {
    echo "<h1> success! <h1>";
    echo "<h3>{$discipline}</h3> <h3>{$lectures}</h3> <h3>{$practical}</h3> <h3>{$laboratory}</h3> <h3>{$hours}</h3> <h3>{$email}</h3> <h3>{$phone}</h3>";
}

?>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html> 


 
