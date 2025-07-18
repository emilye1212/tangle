<?php
// my first php
echo "Emily Everett <br />";
echo "c3622379 <br />";

echo "<h1>Using escape characters </h1>";
echo "\"most programmers say its better to use 'echo' rather than 'print'\" says who?<br />";

echo "<h1>Variables</h1>";
    $name = "David";
    $age = 12;
    $heightInMetres =  1.8;
echo "Hi, my name is ".$name. " and I am " .$age." years old. <br />";
echo "Hola, mi nombre es David y tengo 12 anos de edad.<br />";

echo "<h1>Functions</h1>";
//gettype() returns the type of variable. "string"
echo gettype($name);

echo '<br />';

//strlen() returns the lenght of a given string. "5"

echo strlen($name);

echo '<br />';

//strtoUpper()returns given variables to upper case. "DAVID"

echo strtoUpper($name);

echo "<h1>Arithmetic</h1>";
    $num1 = 9;
    $num2 = 12;

echo "num1 = " .$num1. "<br />";
echo "num2 = " .$num2. "<br />";
echo "num1 x num2 = " .($num1 * $num2). "<br />"; 
echo "num1 as a percentage of num2 = ".(($num1 /$num2) * 100)."%<br />";

    $division = intdiv($num2, $num1);
    $remainder = $num2 % $num1;
echo "num2 divided by num1 = " .$division. " remainder " .$remainder. "<br />"; 

$heightInInches = $heightInMetres * 39.37;
$feet = floor($heightInInches / 12);
$inches = $heightInInches % 12;

echo "Name: ".$name. "<br />"; 
echo "Age: ".$age. "<br />";
echo "Height in Metres: ".$heightInMetres."<br />";
echo "Height in Feet and Inches: ".$feet."ft ".$inches." inches.<br />";
?>