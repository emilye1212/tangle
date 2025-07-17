<?php
include 'init.php';

if (isset($_POST['change_password'])) {
    $userId = $_SESSION['userId'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    if (empty($newPassword)) {
        echo "Please enter a new password.<br>";
    } else {
        $query = "SELECT userPassword FROM Credentials WHERE userId='$userId'";
        $result = mysqli_query($connection, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['userPassword'];

            echo "Stored password: " . $storedPassword . "<br>"; // Debugging line
            echo "Old password entered: " . $oldPassword . "<br>"; // Debugging line
            
            // Check if the entered old password matches the stored hashed password
            if (password_verify($oldPassword, $storedPassword)) {
                $newPassword = "Blossom100";  // The new password entered by the user
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);  // Hash it before saving

                // Update the password with the hashed value
                $updateQuery = "UPDATE Credentials SET userPassword='$hashedPassword' WHERE userId='$userId'";

                if (mysqli_query($connection, $updateQuery)) {
                    $_SESSION['password_update_success'] = "Password updated successfully.";
                    header("Location: settings.php");
                    exit();
                } else {
                    echo "ERROR: Could not execute query. " . mysqli_error($connection);
                }
            } else {
                echo "Old password is incorrect. Please try again.<br>";
            }
        } else {
            echo "ERROR: Could not fetch user data. " . mysqli_error($connection);
        }
    }
}
?>