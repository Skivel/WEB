<?php

if(!empty($_POST['height'])) {

    if($_POST['gender'] == 'male') {
        $height = $_POST['height'];   
        for($i = 0; $i < 1; $i++) 
            echo "Your perfect height: " . ($height - 100 - 0.2*($height - 152)) . "kg";
    } 
    elseif($_POST['gender'] == 'female') {
        $height = $_POST['height'];  
        for($i = 0; $i < 1; $i++) 
            echo "Your perfect height: " . ($height - 100 - 0.4*($height - 152)) . "kg";
    }
    else { echo 'Error input data !!!'; }

}
else { echo 'Error input data !!!'; }
?>