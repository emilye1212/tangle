    <h1>Work with databases </h1>
    <form method="post" action="insertMedicine.php">
        <label>Medicine Name:</label>
        <input type="text" name="mediName">
        <label>Medicine Dose(ml):</label>
        <input type="text" name="txtDose">
        <label>Medicine Frequency:</label>
        <input type="text" name="txtFrequency">
        <input type="submit" value="Submit" name="mediSubmit">
    </form>

    <h2>Display All Medicine </h2>

<?php
    include 'selectmedi.php';
?>

