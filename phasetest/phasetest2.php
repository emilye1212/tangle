<!DOCTYPE html>
<html>
    <head>
        <title>WAT Phase Test July 2021</title>
    </head>
    <body>
        <h1>Generate Statements</h1>   
        <?php
        /* Output your name and ID to the screen on separate lines 
         */
        echo "Emily Everett </br>";
        echo "c3622379";
        ?>
        <?php
        /*The form below is for calculating the area of a circle.  You should produce code to 
         *gather the radius of the circle in mm and calculate the area in mm squared.  
         *Area of a circle = 3.142 x radius x radius
         *Output the result below the form as shown in the screengrab, adjust the form code as necessary
        */

        ?>
        <h1>Work with HTML forms </h1>
        <form method="post" action="">
        	<label>Radius:</label>
        	<input type="text" name="txtRadius" />
        	<input type="submit" value="Submit" name="subRad"/>
        </form>
        
        <?php
        if(isset($_POST['subRad'])) {
            $radius =  $_POST['txtRadius'];
                $area = pow($radius, 2) * pi();
                echo $area; 
        }
        ?>


        <h1>Use Conditional Statements</h1>

        <?php
        
        /* Declare a variable called age and assign it a value of 23
         *Use an IF statement to test the age variable to assess 
         * whether it is 21 or over.  Output '21 or over' or 'under 21'
         * 
         */
        $age = 23;

        if($age >= 21){
            echo '21 or over. </br>';
        }else{ 
            echo 'Under 21'. '<br/>';
        }
        
        /* Declare a variable called member and assign a value of TRUE.  Write code to assess
         * age and member to produce the following outputs
         * 'Age over 21 and not a member';
         * 'Age under 21 and not a member' ;
         * 'Age over 21 and a member';
         * 'Age under 21 and a member';
         */
        $member = true;
        
        if ($member == true) {
            if ($age >= 21) {
                echo 'Age over 21 and a member.' . '<br/>';
            } else {
                echo 'Age under 21 and a member.' . '<br/>';
            }
        } else {
            if ($age < 21) {
                echo 'Age over 21 and not a member. ' . '<br/>';
            } else {
                echo 'Age under 21 and not a member. ' . '<br/>';
            }
        } 
        		
        ?>
        <h1>Using Loops</h1>

        <?php
        /* Declare an associative array and put in key value pairs of coutries and capitals
         * e.g. France/Paris, India/New Dehli, Kenya/Nairobi
         * use a loop to iterate through the array and output the key=> value pairs to produce:
         * France:  Paris
         * India: New Dehli
         * Kenya: Nairobi
         */
        $cities=array('France'=> "Paris", 'India'=> "New Dehli", 'Kenya' => "Nairobi");
            foreach($cities as $countries => $capitals){
            echo "$countries: $capitals<br>"; 
            }
        ?>
         <?php
        /*The form below will be used to insert a new record into a pizza table
         *First create the pizza table on phpmyadmin using the structure below
         *pizzaID    | pizzaName     | pizzaCategory |  pizzaPrice
         *----------------------------------------------------
         * 1        | Margherita     |     veg       |   9.50
         * 2        | Meat Feast     |     meat      |   11.50
         * 3        | Veggie Feast   |     veg       |   10.50
         * 4        | Peperoni      |     Meat      |   10.00
         * 5        | Chicken        |     meat      |   12.50
         *produce a separate file to
         *complete the insert and return to this page
        */
        ?>
        <h1>Work with databases </h1>
        <form method="post" action="insertPizza.php">
        	<label>Pizza Name:</label>
        	<input type="text" name="txtName" />
        	<label>Pizza Category:</label>
        	<input type="text" name="txtCat" />
        	<label>Pizza Price:</label>
        	<input type="text" name="txtPrice" />
        	<input type="submit" value="Submit" name="subPizza"/>
        </form>

        <h2>Display All Pizza </h2>

        <?php
        include 'displaypizza.php';
        ?>
        
        <?php
        /*
        THIS SECTION IS FOR DEFERRED STUDENTS ONLY
        The form below should be used to input an annual salary. You should use that value to calculate monthly student loan repayments for English students that started before 2023.  The calculation uses the formula below:
        - Monthly Salary = Annual Salary / 12
        - Taxable amount = Monthly Salary - 2274
        - Monthly Tax = (Taxable  Amount /100) x 9

        Gather the value entered into the form (make it greater than 27295)
        Use that vlaue to complete the calcualtion above.  Output as in the example below:

        Monthly Salary = £30000
        Monthly Repayment = £20.34

        For extra marks modify your code so that if a salary of less than 27295
        is entered then the output is simply - 'Salary below threashold, nothing to pay'.

        For more extra marks add validation and provide error messages if the test box is empty or if it is not a number, or if that number is not greater than 1.  Finally make the value persist once form is submitted.
        */
        ?>

        <h1>Work with HTML forms </h1>
        <form method="post" action="">
            <label>Annual Salary:</label>
            <input type="text" name="txtSalary" value="<?php
                if (isset($_POST['txtSalary'])){
                    echo trim($_POST['txtSalary']);
                }
            ?>">
            <input type="submit" value="Submit" name="subSalary">
        </form>
                   
    
    </body>
</html>
        