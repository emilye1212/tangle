<h1> Emily Everett c3622379 </h1>
<h2> Register </h2>
<fieldset>
<legend>New User Details</legend>
<form method="post" action="">
    <label for="userName">User Name: </br> </label>
    <input type="text" name="userName" value="<?php if(isset($_POST['userName'])) { 
        echo $_POST['userName']; } ?>"/><br />

    <label for="userEmail">Email:  </br></label>
    <input type="text" name="userEmail" value="<?php if(isset($_POST['userEmail'])) { 
        echo $_POST['userEmail']; } ?>"/><br />

    <label for="userPass">Password: </br></label>
    <input type="password" name="userPass" value="<?php if(isset($_POST['userPass'])) { 
        echo $_POST['userPass']; } ?>"/><br />

    <label>Age: </label>    
    <select name="userAge">
        <option value="overAge">Over 18+</option>
        <option value="underAge">Under 18-</option>
    </select><br/>

    <label for="agree">Click to Confirm: </label>
    <input type="checkbox" name="agree" value="agree" <?php if(isset($_POST['agree']) && $_POST['agree'] === 'agree') { 
        echo 'checked'; } ?>><br />

    </fieldset>
    <input type="submit" name="submit" value="Submit"/>
    <input type="button" value="Clear" onclick="location.href='clear.php'"><br/>

</form>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connection.php'; 

if (isset($_POST['submit'])) {
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPass = $_POST['userPass'];
    $userAge = $_POST['userAge'];

    if (empty($userName) || empty($userEmail) || empty($userPass) || empty($userAge)) {
        echo "Please fill in all fields.<br>";
    }

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address.<br>";
    }

    if (!isset($_POST['agree']) || $_POST['agree'] !== 'agree') {
        echo "Please tick the box.<br>";
    }

    if (empty($userName) || empty($userEmail) || empty($userPass) || empty($userAge) || !filter_var($userEmail, FILTER_VALIDATE_EMAIL) || (!isset($_POST['agree']) || $_POST['agree'] !== 'agree')) {
    } else {
        $query = "INSERT INTO Register (UserName, UserEmail, UserPass, UserAge) VALUES ('$userName', '$userEmail', '$userPass', '$userAge')";
        echo $query;
        exit;
        if(mysqli_query($connection, $query)){
            echo "Record inserted successfully.";
        } else {    
            echo "ERROR: Could not able to execute $query. " . mysqli_error($connection);
        }
    }
}
if (isset($_POST['clear'])) {
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}
?>


