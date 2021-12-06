
<?php
// One line
# One line
/*
 * Multiline
 * comment
 */

//  namespace MyProject\Controllers;

$nume_var;
$v1 = 1;
$v2 = 2.6;
$v3 = "Lorem ipsum";
$v4 = true;
$v5 = array(1,2,3);
$v6 = null;

echo "<h1>Hello world!</h1>";

print "<h1>Hello world!</h1>";
print("<h1>Hello world!</h1>");
print($v1);
print_r($v5);

// String funtions
echo strlen($v3);
echo str_word_count($v3);
echo strrev($v3);
echo strpos($v3, "ipsum");
echo str_replace("ipsum", "lorem", $v3);

// Number properties
echo PHP_INT_MAX;
echo PHP_INT_MIN;
echo PHP_INT_SIZE;
echo PHP_FLOAT_MAX;
echo PHP_FLOAT_MIN;
echo -PHP_FLOAT_MAX;

echo is_int($v1);
echo is_integer($v1);
echo is_long($v1);
echo is_float($v2);
echo is_double($v2);

echo is_finite($v2);
echo is_infinite($v2);
echo is_nan($v2);

echo (int)$v2;
echo (float)$v1;


// Math functions
echo abs(-5);
echo pow(2, 3);
echo sqrt(9);
echo max(1,2,3,4,5);
echo min(1,2,3,4,5);
echo round(3.5);
echo round(3.5, 1);
echo pi();
echo rand();
echo rand(1,10);


//Constants
define("PI", 3.14);
echo PI;
define('TEST_CONST', 'string', true);
echo test_const;
define("VECT", array(1,2,3));

// Arithmetic operators
echo 1 + 2;
echo 1 - 2;
echo 1 * 2;
echo 1 / 2;
echo 1 % 2;
echo 1 ** 2;

// Assignment operators
$v1 = 1;
$v1 += 2;
$v1 -= 2;
$v1 *= 2;
$v1 /= 2;
$v1 %= 2;

// Comparision operators
echo 1 == 1;
echo 1 === 1;
echo 1 != 1;
echo 1 !== 1;
echo 1 < 1;
echo 1 > 1;
echo 1 <= 1;
echo 1 >= 1;

// Increment/Decrement operators
$v1 = 1;
$v1++;
$v1--;
++$v1;
--$v1;

// Logical operators
echo false && true;
echo false || true;
echo !false;

// String operators
echo "Hello" . " world!";
echo "Hello" . " " . "world!";
$test = "Hello";
$test .= " world!";
echo $test;

// Array operators
$v1 = array(1,2,3);
$v2 = array(4,5,6);
$v3 = $v1 + $v2;
echo $v1 == $v2;
echo $v1 === $v2;
echo $v1 != $v2;
echo $v1 !== $v2;

// Conditional operators
echo true ? "true" : "false";

// if..else..elseif
$v1 = 1;
if ($v1 == 1) {
    echo "v1 is 1";
} elseif ($v1 == 2) {
    echo "v1 is 2";
} else {
    echo "v1 is not 1 or 2";
}

// switch
$v1 = 1;
switch ($v1) {
    case 1:
        echo "v1 is 1";
        break;
    case 2:
        echo "v1 is 2";
        break;
    default:
        echo "v1 is not 1 or 2";
}

// while
$v1 = 1;
while ($v1 <= 10) {
    echo $v1;
    $v1++;
}

// do..while
$v1 = 1;
do {
    echo $v1;
    $v1++;
} while ($v1 <= 10);

// for
for ($i = 0; $i < 10; $i++) {
    echo $i;
}

// foreach
$v1 = array(1,2,3);
foreach ($v1 as $value) {
    echo $value;
}

foreach ($v1 as $key => $value) {
    echo $key . ": " . $value;
}

// Indexed Array
$v1 = array(1,2,3);
echo $v1[0];
echo $v1[1];
echo $v1[2];

// Associative Array
$v1 = array("a" => 1, "b" => 2, "c" => 3);
echo $v1["a"];
echo $v1["b"];
echo $v1["c"];

// Multidimensional Array
$v1 = array(
    array(1,2,3),
    array(4,5,6),
    array(7,8,9)
);

count($v1);

// Sorting arrays
$v1 = array(1,2,3,4,5,6,7,8,9);
$v2 = array("a" => 1, "b" => 2, "c" => 3);
sort($v1);
rsort($v1);
asort($v2);
arsort($v2);
ksort($v2);
krsort($v2);

// Functions
function test() {
    echo "Hello world!";
}

function test2($v1) {
    echo $v1;
}

function test3($v1, $v2) {
    return $v1 + $v2;
}

function test4(int $v1, int $v2) {
    return $v1 + $v2;
}

// Regular expressions
$v1 = "Hello world!";
echo preg_match("/world/", $v1);

// Regular expression to validate email
$v1 = "[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+";

// Regular expression to validate name
$v1 = "[a-zA-Z]+";

// Classes
class Test {
    public $v1;
    public $v2;
    protected $v3;

    public function __construct($v1, $v2) {
        $this->v1 = $v1;
        $this->v2 = $v2;
    }

    public function __destruct() {
        echo "Destructor called";
    }

    public function test() {
        echo $this->v1;
    }

    public function get_v3() {
        return $this->v3;
    }

    public function set_v3($v3) {
        $this->v3 = $v3;
    }

}

$test_instance = new Test(1,2);
$test_instance->v1 = 3;
print_r($test_instance);

//Output of print_r($test_instance)
/*
object(Test)#1 (2) {
  ["v1"]=>
  int(1)
  ["v2"]=>
  int(2)
}
*/

// Inheritance
class Test2 extends Test {
    const TEST_CONST = "test";
    public static $test_static = "test";

    //create static method
    public static function test2() {
        echo "Hello world!";
    }

    private $v4;

    public function test() {
        echo $this->v3;
    }

    public function get_v4() {
        return $this->v4;
    }

    public function set_v4($v4) {
        $this->v4 = $v4;
    }

    public function printConstant() {
        echo self::TEST_CONST;
    }
}
Test2::test2();
echo Test2::test_static;
$test2_instance = new Test2(1,2);
$test2_instance->set_v4(3);
echo Test2::TEST_CONST;

print_r($_GLOBALS);

// Abstract classes
abstract class Car {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function get_name();
    abstract public function get_speed();
    abstract public function get_price();
}

// Child class of Car
class Car2 extends Car {
    public function get_name() {
        return $this->name;
    }

    public function get_speed() {
        return "100km/h";
    }

    public function get_price() {
        return $this->price;
    }
}

$car = new Car2("Toyota", 100000);
echo $car->get_name();
echo $car->get_speed();
echo $car->get_price();

//Interfaces
interface CarInterface {
    public function get_name();
    public function get_speed();
    public function get_price();
}

class Car3 implements CarInterface {
    public function get_name() {
        return "Toyota";
    }

    public function get_speed() {
        return "100km/h";
    }

    public function get_price() {
        return 100000;
    }
}
?>
