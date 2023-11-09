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
			<button type="submit" name="forgot">Submit <i class="fa-solid fa-paper-plane"></i></button>
		</form>
		<a class="option" href="index.php"><i class="fa-solid fa-left-long"></i> Back to Login Page</a>
	</div>
	<?php include('partials/footer.php') ?>
</body>

</html>