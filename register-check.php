<?php
session_start();
include "config/config.php";

if (isset($_POST['register'])) {

	// Function to validate POST data
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// Validating user inputs
	$username = validate($_POST['username']);
	$loginemail = validate($_POST['loginemail']);
	$password = validate($_POST['password']);
	$confirmPassword = validate($_POST['confirmPassword']);

	// Password Confirmation
	if ($password !== $confirmPassword) {
		echo '<script>
				alert("Passwords should match!");
				window.location.replace("http://localhost/PHP_Authentication/register.php");
              </script>';
		exit();
	} else {
		$password = md5($password); // Hashing the password

		// Checking for existing credentials
		$sql = "SELECT * FROM `users` WHERE `username`='$username'";
		$result = mysqli_query($conn, $sql);
		$sql3 = "SELECT * FROM `users` WHERE `loginemail`='$loginemail'";
		$result3 = mysqli_query($conn, $sql3);

		// Existing Username
		if (mysqli_num_rows($result) > 0) {
			echo '<script>
					alert("This username belongs to someone else!");
					window.location.replace("http://localhost/PHP_Authentication/register.php");
				  </script>';
			exit();
		// Existing Email
		} elseif (mysqli_num_rows($result3) > 0) {
			echo '<script>
					alert("This Email belongs to someone else!");
					window.location.replace("http://localhost/PHP_Authentication/register.php");
				  </script>';
			exit();
		} else {
			// Register the new user
			$sql2 = "INSERT INTO `users`(`username`, `loginemail`, `password`) VALUES('$username', '$loginemail', '$password')";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				echo '<script>
						alert("Registration successful! Login to access your dashboard.");
						window.location.replace("http://localhost/PHP_Authentication/");
					  </script>';
				exit();
			} else {
				echo '<script>
						alert("Unexpected error occured, try after some time!");
						window.location.replace("http://localhost/PHP_Authentication/register.php");
					  </script>';
				exit();
			}
		}
	}
} else {
	header('Location: http://localhost/PHP_Authentication');
}
