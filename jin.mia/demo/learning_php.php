<? 

// phpinfo(); 
// broken

echo "<h1>Hello World<h1>";
echo "Goodbye World";

// assignment operator
$a = 5;

// String Interpolation
echo "<div>I have $a thigs</div>";
echo '<div>I have $a things</div>';

// Value Types

// Number
// Integer
$b = 15;
// Float
$b = 0.576;

$b = 10;

// String
$name = "Yerdude";
$name = 'Mia';

// Boolean
$isOn = true;

// function, class, object


// Math



// Order of Operation
// PEMDAS
echo (5 + 2 )* 3;

// Concatenation
echo "<div>b + a = c</div>";
echo "<div>$b + $a =" . ($b+$a) . "</div>";

?>


<hr>
<div>This is my name</div>
<div>
	<?php 

$firstname = "Mia";
$lastname = "Jin";
$fullname = "$firstname $lastname";

echo $fullname;

?>
</div>

<hr>

<?php 

// Superglobal
echo "Name is: ".$_GET['name'];
echo "<div><a href='?name=Bob'>Bob</a></div>";
echo "<div><a href='?name=Grace'>Grace</a></div>";

echo "<div><a href='?name={$_GET['name']}&type=h1'>H1</a></div>";
echo "<div><a href='?name={$_GET['name']}&type=textarea'>Textarea</a></div>";
echo "Name is: <{$_GET['type']}>{$_GET['name']}</{$_GET['type']}>";


?>

<hr>

<?php

// Arrays
$colors = array("red","green","blue");
$colors = ["red","green","blue"];

echo $colors[2];

?>











