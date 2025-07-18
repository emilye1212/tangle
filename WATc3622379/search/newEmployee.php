<h2> Create Employee Account </h2>
<fieldset>
<legend> Employee Details</legend>
<form method="post" action="">
    <label for="userName">User Name: </br> </label>
    <input type="text" name="userName" value="<?php if(isset($_POST['userName'])) { 
        echo $_POST['userName']; } ?>"/><br />

    <label for="userPass">Password: </br></label>
    <input type="password" name="userPass" value="<?php if(isset($_POST['userPass'])) { 
        echo $_POST['userPass']; } ?>"/><br />

    </fieldset>
    <input type="submit" name="submit" value="Submit"/>
    <input type="button" value="Clear" onclick="location.href='clear.php'"><br/>

</form>
<p><a href="sessions.php">Back</a></p>
<p><a href="protected.php">Admin Homepage</a></p>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'init.php'; 

if (isset($_POST['submit'])) {
    $userName = $_POST['userName'];
    $userPass = $_POST['userPass'];

    if (empty($userName) || empty($userPass)) {
        echo "Please fill in all fields.<br>";
    } else {
        $query = "INSERT INTO Staff (StaffName, StaffPass) VALUES ('$userName', '$userPass')";
        
        if(mysqli_query($connection, $query)){
            echo "Account created successfully.";
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
