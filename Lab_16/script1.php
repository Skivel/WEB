<?php
session_start();
$port = 8000;
if ($_SESSION["session"] != NULL) {
	process();
}
else if (isset($_POST['login'])) 
{ 
	$login = $_POST['login'];
		if ($login == '123') {
			unset($login);
			$_SESSION["session"] = uuid();
			process();
		}
	else{
		echo "Login or paswd WRONG!!!!!";
	}
}
else {
	header("Location: localhost:{$port}");
	die();
}
	
//--------------------------------------------------------------------------
class ObjectMapper() {
    
        public static function write($obj) {
            return json_encode($obj);
        }
        
        public static function read($json) {
            return json_decode($json);
        }
    }

    class FileReader {
    
        public static function read($filename) {
            if (!isExist($filename))
                return "";
                
            $file = fopen($filename, "r");
            $text = fread($file, filesize($filename));							//	N 	R
            fclose($file);														//	O 	E
            																	//	T 	A   !!!!!!!!!!!!!
            return $text;														//		D
        }																		//		Y
        
        private static function isExist($filename) {
            return file_exists($filename);
        } 
    }

    class FileWriter {
        
        public static function write($text, $filename) {
            createnx($filename);
            $file = fopen($filename, "r+") or die("Unable to open file!");
            fwrite($file, $text);
            fclose($file);
        }
        
        private static function createnx($filename) {
            if (!file_exists($filename)) {
                touch($filename);
            }
        }
    }

//------------------------------------------------------------------------------

function show_form() {
    ?>
    <form action="script1.php" method="post">
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
    $_SESSION["session"]=NULL;
    unset($_SESSION['login']);
	session_destroy();
}

function process() {
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
}

function uuid()
{
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}
?>