<head>
    <title>Cats4Homes</title>
</head>
<body>
    <h1>Cats4Homes</h1>
    
    <label for="searchbar">Search:  </label>
    <input type="text" name="searchbar"/><br />    

    <p><a href="firstpage.php">Back to Homepage</a></p>
    <p><a href="adminLogin.php">Admin Login</a></p>


     <form action="process.php" method="GET">
        <label>Sort by:</label><br/>
        <label>Breed:</label>    
        <select name="breed">
            <option value="-"> -- </option>
            <option value="t"> Tortoiseshell </option>
            <option value="s"> Sphynx </option>
            <option value="r"> Ragdoll </option>
            <option value="si"> Siamese </option>
        </select><br/>       
        <label>Price:</label>    
        <select name="price">
            <option value="0"> -- </option>
            <option value="1"> >£49 </option>
            <option value="2"> £50 - £99 </option>
            <option value="3">  £100 - £149 </option>
            <option value="4"> £150 - £200< </option>
        </select><br/>  
        <input type="submit" value="Apply">
    </form>
</body>        

<?php
include 'init.php';

if (isset($_POST['submit'])) {
    $searchTerm = strtolower($_POST['search']);

    if (!empty($searchTerm)) {
        $query = "SELECT * FROM Adoption WHERE PetName LIKE '%$searchTerm%'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("<i>No matching results.</i> " . mysqli_error($connection));
        }

        echo '<h2>Search Results</h2>';

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<p>Name: '. $row['PetName']. '</p>';
                echo '<p>Category: '. $row['PetCatagory']. '</p>';
                echo '<p>Price: £'. $row['PetPrice']. '</p>';
            }
        } else {
            echo 'No matching results found.';
        }
    } else {
        echo 'No info entered. </br>'; 
        echo '<i>Displaying all kitties</i><br>';
        echo '<h2>All Cats</h2>';

        $query = "SELECT * FROM Adoption ORDER BY PetName ASC";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Error." . mysqli_error($connection));
        }
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<img src='./kittypics/" . $row['PetImage'] . "' width='100' height='100'>";
                echo "Name: " . $row['PetName'] . "<br>";
                echo "Price: £" . $row['PetPrice'] . "<br>";
                echo "Breed: " . $row['PetCatagory'] . "<br>";
                echo "Age: " . $row['PetAge'] . "<br>";
                echo "Info: " . $row['PetInfo'] . "<br>";
                echo "<br>";
            }
        } else {
            echo 'No kitties found.';
        }
    }       
} elseif (isset($_POST['viewall'])) { 
    echo '<h2>All Cats</h2>';
    $query = "SELECT * FROM Adoption ORDER BY PetName ASC";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Error." . mysqli_error($connection));
    }
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<img src='./kittypics/" . $row['PetImage'] . "' width='100' height='100'><br/>";
            echo "Name: " . $row['PetName'] . "<br>";
            echo "Price: £" . $row['PetPrice'] . "<br>";
            echo "Breed: " . $row['PetCatagory'] . "<br>";
            echo "Age: " . $row['PetAge'] . "<br>";
            echo "Info: " . $row['PetInfo'] . "<br>";
            echo "<br>";
        }
    } else {
        echo 'No kitties found.';
    }
}
?>
</body>

