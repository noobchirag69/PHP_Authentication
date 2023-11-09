<?php
  session_start();
  include "config/config.php";
  
  if (isset($_POST['change'])) {
  	
    // Function to validate POST data
  	function validate($data) {
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
    
    // Validating the password fields and storing them
  	$password = validate($_POST['password']);
    $newPassword = validate($_POST['newPassword']);
  	$confirmNewPassword = validate($_POST['confirmNewPassword']);
    
    // If Old Password (hashed) doesn't match with Database
    if (md5($password) !== $row['password']) {
      echo '<script>
              alert("Incorrect old password!");
              window.location.replace("http://localhost/PHP_Authentication/change-password.php");
            </script>';
      exit();
    // If Old Password and New Password are same
    } elseif ($password === $newPassword) {
      echo '<script>
              alert("Old and new passwords should not be same!");
              window.location.replace("http://localhost/PHP_Authentication/change-password.php");
            </script>';
      exit();
    // If New Password doesn't confirm
    } elseif ($newPassword !== $confirmNewPassword) {
  		echo '<script>
              alert("Passwords should match!");
              window.location.replace("http://localhost/PHP_Authentication/change-password.php");
            </script>';
  		exit();
    // If everything goes right
  	} else {
        // Hashing the new password
  		  $newPassword = md5($newPassword);
        // Updating the new password in database
  			$sql = "UPDATE `users` SET `password` = '$newPassword' WHERE `username` = '$username'";
  			$result = mysqli_query($conn, $sql);
  			if ($result) {
  				echo '<script>
                  alert("Password has been changed successfully!");
                  window.location.replace("http://localhost/PHP_Authentication/dashboard.php");
                </script>';
  				exit();
  			} else {
  				echo '<script>
                  alert("Unexpected error occured, try after some time!");
                  window.location.replace("http://localhost/PHP_Authentication/change-password.php");
                </script>';
  				exit();
  			}
 		}
  } else {
  	header('Location: http://localhost/PHP_Authentication');
  }
?>