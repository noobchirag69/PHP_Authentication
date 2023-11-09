<?php
session_start();
include "config/config.php";

if (isset($_POST['login'])) {
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
	$password = validate($_POST['password']);

	// Hashing the password
	$password = md5($password);

	// Fetching info from database
	$sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
	$result = mysqli_query($conn, $sql);

	// If found
	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if ($row['username'] === $username && $row['password'] === $password) {
			// Storing account info in session
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['loginemail'] = $row['loginemail'];
			echo '<script>
					alert("You have successfully logged in!");
					window.location.replace("http://localhost/PHP_Authentication/dashboard.php");
				  </script>';
		} else {
			echo '<script>
					alert("Incorrect Credentials!");
					window.location.replace("http://localhost/PHP_Authentication/");
				  </script>';
			exit();
		}
	} else {
		echo '<script>
				alert("Account does not exist!");
				window.location.replace("http://localhost/PHP_Authentication/");
			  </script>';
		exit();
	}
} else {
	header('Location: http://localhost/PHP_Authentication');
}
