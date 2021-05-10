<?php

if(!empty($_POST['num1']) && !empty($_POST['num2'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    for($i = 0; $i < 1; $i++) {
        echo "Sum number $num1 and $num2 it is a " . ($num1+$num2);
    }
}
else {
    echo 'Error input data !!!';
}
?>