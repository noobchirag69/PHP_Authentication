<?php
session_start();
if (isset($_SESSION['id'])) {
	header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php $title = 'Password Recovery'; ?>
<?php include('partials/head.php'); ?>

<body>
	<?php include('partials/navbar.php') ?>
	<div tabindex="0" class="wrapper">
		<h1 tabindex="0">Forgot Password</h1>
		<form action="forgot-password-check.php" method="POST">
			<input type="email" placeholder="Email Address" name="loginemail" required />
			<button type="submit" name="forgot">Submit</button>
		</form>
		<a class="option" href="index.php">Back to Login Page</a>
	</div>
</body>

</html>