<html>
<head>
<title>In the animal world</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

<?php

    $cat = new Cat("valdimor", "black & white");
    $fox = new Foxi("nikita", "orange");
    
    $c_color = $cat->get_color();
    $f_color = $fox->get_color();
    
    echo $cat->say_hello();
    echo "<br>";
    
    echo "cat color: {$c_color}";
    echo "<br>";
    
    echo $fox->say_hello();
    echo "<br>";
    
    echo "fox color: {$f_color}";

    
    abstract class Fox {
    
        protected $name;
        protected $color;
        
        protected function __construct($name, $color) {
            $this->name = $name;
            $this->color = $color;
        }
        
        
        protected function say_hello() {
            return "hello";
        }
        
        public function get_name() {
            return $this->name;
        }
        
        public function get_color() {
            return $this->color;
        }
    }
    
    class Cat extends Fox {
    
        public function __construct($name, $color) {
            parent::__construct($name, $color);
        }

        public function say_hello() {
            return "meo-meow. my name is {$this->name}";
        }
    }
    
    class Foxi extends Fox {
        
        public function __construct($name, $color) {
            parent::__construct($name, $color);
        }

        public function say_hello() {
            return "hhee-eee-e-e-e. my name is {$this->name}";
        }
    }

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html> 


 
