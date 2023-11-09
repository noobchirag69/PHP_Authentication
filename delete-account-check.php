<?php
session_start();
include "config/config.php";

if (isset($_POST['delete'])) {

    // Function to validate POST data
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Retrieving Account Info from DB via Username
    $username = $_SESSION['username'];
    $sql2 = "SELECT * FROM `users` WHERE `username`='$username'";
    $result2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($result2);

    // Validating user input
    $password = validate($_POST['password']);

    // If hashed password doesn't match with Database
    if (md5($password) !== $row['password']) {
        echo '<script>
              alert("Incorrect password!");
              window.location.replace("http://localhost/PHP_Authentication/delete-account.php");
            </script>';
        exit();
        // If everything goes right
    } else {
        // Deleting the user info from the database
        $sql = "DELETE FROM `users` WHERE `username` = '$username'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // Closing the session
            session_unset();
            session_destroy();
            echo '<script>
                    alert("Your account has been deleted successfully!");
                    window.location.replace("http://localhost/PHP_Authentication/dashboard.php");
                  </script>';
            exit();
        } else {
            echo '<script>
                    alert("Unexpected error occured, try after some time!");
                    window.location.replace("http://localhost/PHP_Authentication/delete-account.php");
                  </script>';
            exit();
        }
    }
} else {
    header('Location: http://localhost/PHP_Authentication');
}
