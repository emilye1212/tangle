<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<h1>Processing Input from HTML Forms</h1>
<h2>Login Form using GET</h2>

<form method="post" action="">
<fieldset>
<legend>
Login
</legend>
<label for="email">Email: </label>
<input type="text" name="txtEmail"/><br />
<label for="passwd">Password: </label>
<input type="password" name="txtPass" /><br />
<input type="submit" value="Submit" name="loginSubmit" />
<input type="reset" value="Clear" />
</fieldset>
</form>

<?php
if(isset($_POST['loginSubmit'])){
    $email = $_POST["txtEmail"];
    $password = $_POST["txtPass"];

    echo "Email: " . $email . "<br>";
    echo "Password: " . $password . "<br>";
}else{
    echo "Please sumbit email and password.";
}
?>

<form method="get" action="">
<fieldset>
<legend>Comments</legend>
<label for="txtEmail">Email: </label>
<input type="text" name="txtEmail" value="<?php 
    if(isset($_GET['txtEmail'])){ 
        echo $_GET['txtEmail'];
         }
?>" /><br />
<textarea rows="4" cols="50" name="txtarea"><?php 
    if(isset($_GET['txtarea'])){ 
        echo $_GET['txtarea']; 
    } 
?></textarea><br />

<label for="agree">Click to Confirm: </label>
<input type="checkbox" name="agree" value="agree"><br />
<input type="submit" value="Submit" name="submitbx"/>
<input type="reset" value="Clear" />
</fieldset>
</form>

<?php
if(isset($_GET['submitbx'])){
    if(empty($_GET['txtEmail'])){
        echo "Email must not be empty. ";
    } else {
        $email1 = $_GET['txtEmail'];
        $textbox = $_GET['txtarea'];
        if (filter_var($email1, FILTER_VALIDATE_EMAIL)) {
            if(isset($_GET['agree'])){
                $confirm = 'Agreed';
                echo "Email: "."$email1"."<br/>Comments: "."$textbox". "<br/>Confirm: "."$confirm"."<br/>";
            } else {
                if (!empty($_GET['txtarea'])) {
                    echo "Please tick the box.";
                }
            }
        } else {
            echo "Please enter a valid email address.";
        }
    }
}
?>


<h1> Tax Calculator </h1>
<fieldset>
<legend>Without TAX calculator</legend>
<form method="post" action="">
<div style="display: inline-block;">
    <label for="afterTaxPrice">After Tax Price: </label>
    <input type="text" name="afterTaxPrice"/><br />
</div>
<div style="display: inline-block;">
    <label for="taxRate">Tax Rate:  </label>
    <input type="text" name="taxRate"/><br />
</div>
<input type="submit" value="Submit" name="submitbx2"/>
<input type="reset" value="Clear" />

</form>
</fieldset>

<?php
if(isset($_POST['submitbx2'])){
    $afterTaxPrice = $_POST['afterTaxPrice'];
    $taxRate = $_POST['taxRate'];

    if(empty($afterTaxPrice) || empty($taxRate)){
        $errorMessage = "All fields required.<br/>"; 
        echo $errorMessage;
    }
    elseif (!is_numeric($afterTaxPrice) || !is_numeric($taxRate)) {
        echo "Please enter a valid number.<br/>";
    }
    elseif (!filter_var($taxRate, FILTER_VALIDATE_INT)) {
        echo "Invalid Rate entered. Please enter a whole number for tax rate.<br/>";            
    }
    else {
        $beforeTaxPrice = (100 * $afterTaxPrice) / (100 + $taxRate);
        echo "<strong>Before Tax Price: </strong> $" . number_format($beforeTaxPrice, 2) . "<br>";
    }
}    
?>

<h1>Passing Data Appended to an URL</h1>

<h2>Pick a category</h2>

<a href="forms.php?cat=Films">Films</a>

<a href=" forms.php?cat=Books">Books</a>

<a href=" forms.php?cat=Music">Music</a>

<?php

if(isset($_GET['cat'])) {
    $catagory = $_GET['cat'];
    echo "</br><strong>The catagory chosen is: </strong>".$catagory;
}
