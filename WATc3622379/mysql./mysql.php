
<fieldset>
<legend>Enter Customer Details</legend>
<form method="post" action="insertRecord.php">
    <label for="firstName">First Name: </label>
    <input type="text" name="firstName"/><br />

    <label for="lastName">Last Name:  </label>
    <input type="text" name="lastName"/><br />

    <label for="email">Email: </label>
    <input type="text" name="email"/><br />

    <label for="password">Password: </label>
    <input type="text" name="password"/><br/>

    <label>Gender: </label>    
    <select name="gender">
        <option value="f">Female</option>
        <option value="m">Male</option>
    </select><br/>

    <label for="age">Age: </label>
    <input type="text" name="age"/><br/>

    <input type="submit" name="submit" value="Submit"/>
</form>
</fieldset>

<?php

include 'selectRecord.php';

?>
