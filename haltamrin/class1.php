<?php
// class Person
// {
//     public $firstName = "";
//     public $lastName = "";

//     public function __construct()
//     {
//         echo "My Class Initialized!";
//     }

//     public function arrayUitls(){
//         $var=$this->arr;
//         sort($var);
//         foreach ($var as $item){
//             echo $item."<br>";
//         }
//     }
// }

// class Printst
// {
//     public $var = "";
//     public $hello = "Hello, I am";
//     public function printstr($a)
//     {
//         $this->var = $a;
//         echo $this->hello . " " . $this->var;
//     }
// }

// class check
// {
//     public $num = "";
//     public function isint($input)
//     {
//         if (is_int($input)) {
//             $this->num = $input;
//             echo $this->num;
//         } else {
//             echo "this is not a numeric input!";
//         }
//     }
//     public $result = 1;
//     public function fucturiel()
//     {
//         for ($i = 1; $i <= $this->num; $i++) {
//             $this->result = $this->result * $i;
//         }
//         echo $this->result;
//     }
// }

// class Calc
// {
//     public $num1;
//     public $num2;
//     public function setNumber($var1, $var2)
//     {
//         $this->num1 = $var1;
//         $this->num2 = $var2;
//     }
//     public function sum()
//     {
//         echo $this->num1 + $this->num2;
//     }
//     public function dif()
//     {
//         echo $this->num1 - $this->num2;
//     }
//     public function mul()
//     {
//         echo $this->num1 * $this->num2;
//     }
//     public function div()
//     {
//         echo $this->num1 / $this->num2;
//     }
// }

class Calcoop implements Number
{
    // public $num = "";
    public function isint($input)
    {
        if (is_int($input)) {
            $this->num = $input;
            echo $this->num;
        } else {
            echo "this is not a numeric input!";
        }
    }
    public function isfloat($input)
    {
        if (is_float($input)) {
            $this->num = $input;
            echo $this->num;
        } else {
            echo "this is not a float input!";
        }
    }
    public $num1 = "";
    public function __construct($var1)
    {
        $this->num1 = $var1;
    }
    public function sum()
    {
        echo $this->num1 + $this->num;
    }
    public function dif()
    {
        echo $this->num1 - $this->num;
    }
    public function mul()
    {
        echo $this->num1 * $this->num;
    }
    public function div()
    {
        echo $this->num1 / $this->num;
    }
}
interface Number
{
    public function isint($var);
    public function isfloat($var);
    public function sum();
    public function dif();
    public function mul();
    public function div();
}

class dataFormater
{
    public $f = "";
    public function format($a)
    {
        $b[] = explode(':', $a);
        $y = strlen($b[0]);
        for ($i = 1; $i <= $y; $i++) {
        }
        $m = strlen($b[1]);
        for ($i = 1; $i <= $m; $i++) {
        }
        $d = strlen($b[2]);
        for ($i = 1; $i <= $d; $i++) {
        }
    }
}