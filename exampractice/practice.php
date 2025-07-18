<!DOCTYPE html>
<html lang="en">
<head>
    <title>WATEmilyEverett.php</title>
</head>
<body>
    <h1>Generate Statements</h1>
    <p> Emily Everett </p>
    <p> c3622379 </p>
</html>    
    
    <?php    
    /* Output your name and ID to the screen on separate lines */
    ?>
     <h1>Use Conditional Statements</h1>

    <?php

    $age = 18;

    if($age == 21){
        echo 'Equal to 21';
    }else{ 
        echo 'Not equal to 21'. '<br/>';
    }

/* 
Declare a variable called age and assign it a value of 18
Use an IF statement to test the age variable to assess 
whether it is equal to 21.  Output 'Equal to 21' or 'Not equal to 21'
*/
    $spend = 65;
    $day = 'Mon';

    if ($day == 'Mon') {
        if ($spend >= 50) {
            echo 'Discount applied' . '<br/>';
        } else {
            echo 'Spend not over £50. No Discount' . '<br/>';
        }
    } else {
        if ($spend > 50) {
            echo 'Not Monday. No discount' . '<br/>';
        } else {
            echo 'Less than £50 and not Monday. No discount' . '<br/>';
        }
}

/* 
Any spend over £50 is subject to a 10% discount on Monday.  Declare a variable called 'spend' and assign a value '65', Declare a variable 'day' and assign a value 'Mon'.  Write code to assess the two variables and produce the following outputs
- Discount applied
  - Spend not over £50.  No Discount
  - Not Monday.  No discount
  - Less than £50 and not Monday.  No discount
*/


?>
<h1>Using Loops</h1>
<?php
/* Declare an associative array and put in key value pairs of student names and ID's
e.g. Amin/c123456, Lisa/c234567, Matthew/c345678
use a loop to iterate through the array and output the key=> value pairs to produce:
Amin:  c123456
Lisa: c234567
Matthew: c345678
*/


    $students=array('Amin'=> "c123456", 'Lisa'=> "c234567", 'Matthew' => "c345678");
        foreach($students as $name => $id){
            echo "$name: $id<br>";
}

    
?>
<?php
/*The form below will be used to insert a new record into a medicines table
You can import the table to phpMyAdmin using the .sql file provided.  This will produce the table below
mediID    | mediName      | mediDose(ml)   |  mediFrequency
----------------------------------------------------
 1        | Cure          |     5          |   Daily
 2        | Heal          |     10         |   Daily
 3        | Prevent       |     15         |   Weekly
 4        | Placebo       |     5          |   Daily
complete the form as necessary and produce a separate file to
complete the insert and return to this page
you will need a copy of your connection.php file
*/
include 'connection.php';

// check if the form is submitted
if(isset($_POST['mediSubmit'])) {
    // get my tags
    $medicineName = $_POST['txtName'];
    $medicineDose = $_POST['txtDose'];
    $medicineFrequency = $_POST['txtFrequency'];

    // prep SQL statement to insert into the table
    $sql = "INSERT INTO medicines (mediName, mediDose, mediFrequency) VALUES ('$medicineName', '$medicineDose', '$medicineFrequency')";

    // execute SQL statement
    if(mysqli_query($connection, $sql)) {
        echo "New record inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

}


?>
    
    <h1>Work with databases </h1>
    <form method="post" action="insertMedicine.php">
        <label>Medicine Name:</label>
        <input type="text" name="txtName">
        <label>Medicine Dose(ml):</label>
        <input type="text" name="txtDose">
        <label>Medicine Frequency:</label>
        <input type="text" name="txtFrequency">
        <input type="submit" value="Submit" name="mediSubmit">
    </form>
    
    <h2>Display All Medicine </h2>

<?php
/*All current medicine should be displayed at this point
produce a separate file to display all medicine and include that file
here
*/
        include 'displayAllMedicine.php'; // make seperate file

?>
    
    <h2>Display Small Daily Doses</h2>

<?php
/*Medicine that is delivered daily and less than 10ml should be displayed at this point.  Produce a separate file to display this medicine and include that file here
*/
        include 'displaySelectedMedicine.php';
?>
    
    
<?php
/*
The form below should be used to input an annual salary. You should use that value to calculate monthly student loan repayments for English students that started before 2023.  The calculation uses the formula below:
  - Monthly Salary = Annual Salary / 12
  - Taxable amount = Monthly Salary - 2274
  - Monthly Tax = (Taxable  Amount /100) x 9

Gather the value entered into the form (make it greater than 27295)
Use that value to complete the calculation above.  Output as in the example below:

Annual Salary = £30000
Monthly Repayment = £20.34

For extra marks modify your code so that if a salary of less than 27295
is entered then the output is simply - 'Salary below threshold, nothing to pay'.

For more extra marks add validation and provide error messages if the text box is empty or if it is not a number, or if that number is not greater than 1.  Finally make the value persist once form is submitted.
*/
?>

<h1>Work with HTML forms </h1>
<form method="post" action="">
    <label>Annual Salary:</label>
    <input type="text" name="txtSalary">
    <input type="submit" value="Submit" name="subSalary">
</form>
<?php

    $anualSalary = 30000;
    $monthlySalary = $anualSalary / 12;
    $taxableAmount = $monthlySalary - 2274;
    $monthlyTax = ($taxableAmount / 100) * 9;    
    return $monthlyTax;

    

?>

</body>

</html>
