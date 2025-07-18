<!DOCTYPE html>
<html lang="en">

<head>
    <title>Web Applications and Technologies</title>
    <link type="text/css" rel="stylesheet" href="main.css" />

    </head>

<body>

    <header>
        <h1>Emily Everett C3622379</h1>
    </header>
    <section id="container">
        <h1>Fundamentals of PHP</h1>
        <?php
        ?>
    </section>
    <footer>
        <small> <a href="./html./WATc3622379/watIndex.html">Home</a></small>
    </footer>
</body>
</html>

<h1>Selection</h1>


<?php

$day = 'Tuesday';

if ($day == 'Wednesday') {
    echo "It's midweek.";
} else {
    echo "It's not midweek. <br />";
}

$currentTime = date('H:i');
echo "Time: " .$currentTime. "<br />";

if ($currentTime < 12) {
    echo "Good Morning! :)";
} elseif ($currentTime >= 12 && $currentTime < 18) {
    echo "Good Afternoon! :) <br/>";
} else {        
    echo "Good Night! :) <br />";
}

$password1 = "password"; 

echo strlen($password1)."<br />";
if (strlen($password1) > 4) {
    echo "Password length is invalid. <br />";
} else { 
    echo "Password length is valid. <br />";
}

if ($password1 == 'password') {
    echo "Password valid. <br/>"; 
} elseif ($password1 == 'username') {
    echo "Password invalid. <br/>";
}

$baseprice = 25;
$initialTicketPrice = 25;
$age = 15;
$membership = true;

if ($age <12) {
    $initialTicketPrice = $initialTicketPrice * 0.5;
} elseif ($age >= 12 && $age < 18) { 
    $initialTicketPrice = $initialTicketPrice * 0.75; 
} elseif ($age >= 65) {
    $initialTicketPrice = $initialTicketPrice  * 0.75;
}

if ($membership) {
    $initialTicketPrice = $initialTicketPrice * 0.9;
}

?>


<h1> Ticket Pricing </h1>
 
<?php
echo "Initial ticket price: £".$baseprice. "<br />";
echo "Age: ". $age. "<br/>";

if ($membership == true) { 
    echo "Active Membership: Yes<br />";
} else {
    echo "Active Membership: No<br />";
}
$formatPrice = number_format($initialTicketPrice, 2);
echo "Final Ticket Price: £".$formatPrice;

?>


<h1> Arrays </h1>
<h2> Simple Arrays </h2>


<?php
$products = array("t-shirts", "cap", "mug");
print_r($products);
echo "<br/>";

$products[1]= "shirt";
print_r($products);
echo "<br/>";

$products[]= "skirt";
print_r($products);
echo "<br/>";

echo "The item at index [2] is: <i>".$products[2]."</i><br/>";
echo "The item at index [3] is: <i>".$products[3]."</i><br/>";
?>

<h2> Assosiative Arrays </h2>

<?php

$customer = array('CustID' => 12, 'CustName' => 'Sarah', 'CustAge' => 23, 'CustGender' => 'F');
print_r($customer);
echo "<br/>";

$customer['CustAge'] = 32;

$customer['CustEmail'] = 'sarah@gmail.com';
print_r($customer);
echo "<br/>";

echo "Items in my customer array:<br/>";
echo "The item at index [CustName] is: <i>" . $customer['CustName'] . "</i><br/>";
echo "The item at index [CustEmail] is: <i>" . $customer['CustEmail'] . "</i><br/>";

?>

<h2> Multi-Dimensional Arrays </h2>

<?php

$stock = array(
    'id1' => array(
        'description' => 't-shirt',
        'price' => 9.99,
        'stock' => 100,
        'colours' => array('blue', 'green', 'red')
    ),
    'id2' => array(
        'description' => 'cap',
        'price' => 4.99,
        'stock' => 50,
        'colours' => array('grey', 'blue', 'black')
    ),
    'id3' => array(
        'description' => 'mug',
        'price' => 6.99,
        'stock' => 30,
        'colours' => array('yellow', 'green', 'pink')
    )
);

echo "Stock array:<br/>";
print_r($stock);
?>

<h2>Multi-Dimensional Associative Arrays</h2>

<?php

echo "This is my order:<br/>";
echo "{$stock['id1']['colours'][1]} {$stock['id1']['description']}<br/>";
echo "Price: £{$stock['id1']['price']}<br/>";

echo "{$stock['id2']['colours'][0]} {$stock['id2']['description']}<br/>";
echo "Price: £{$stock['id2']['price']}<br/>";

?>



<h1> Loops </h1>
<h2> While Loop </h2>

<?php

$counter = 1;
$shirtPrice = 9.99;

while ($counter < 6) {
    echo 'Count: ' . $counter . '<br />';
    $counter++;
}

$counter = 1;

echo "<div style='border: 1px solid black; padding: 5px; width: 130;'>";
echo "<table style='border-collapse: collapse;'>";
echo "<tr><td style='border: 1px solid black; padding: 5px;'><strong>Quantity</strong></td><td style='border: 1px solid black; padding: 5px;'><strong>Price</strong></td></tr>";

while ($counter <= 10) {
    $total = $shirtPrice * $counter;
    echo "<tr><td style='border: 1px solid black; padding: 5px;'>$counter</td><td style='border: 1px solid black; padding: 5px;'>£" . number_format($total, 2) . "</td></tr>";
    $counter++;
}
echo "</table>";
echo "</div>";
?>

<h2> For Loops </h2>

<?php

$names = array("Peter", "Kat", "Laura", "Ali", "Popacatapetal");
for ($i = 0; $i < 5; $i++) {
    echo $names[$i] . '<br />';
}

?>

<h2> Foreach Loops </h2> 

<?php

$names = array(
    "Peter" => "c123456",
    "Kat" => "c234567",
    "Laura" => "c345678",
    "Ali" => "c456789",
    "Popacatapetal" => "c567890"
);


foreach ($names as $name => $id) {
    echo "Name: $name ID: $id <br/>";
}
$city = array(
    'Peter' => 'LEEDS',
    'Kat' => 'bradford',
    'Laura' => 'wakeFIeld'
);
echo "<br/>";
print_r($city);


foreach ($city as $key => $value) {
    $city[$key] = ucfirst(strtolower($value));
}
echo "<br/>";
print_r($city);  
?>