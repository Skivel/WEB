<?php

if(!empty($_POST['year']) && $_POST['year'] > 1900 && $_POST['year'] <= 2021) {
    $year = $_POST['year'];

    for($i = 0; $i < 1; $i++) {
        echo "You are " . (2021 - $year) . " years old";
    }
}
else {
    echo 'Error input data !!!';
}
?>
