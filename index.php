<?php
session_start();
if (isset($_SESSION['id'])) {
	header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php $title = 'Login'; ?>
<?php include('partials/head.php'); ?>

<body>
	<?php include('partials/navbar.php') ?>
	<div tabindex="0" class="wrapper">
		<h1 tabindex="0">Login</h1>
		<form action="login-check.php" method="POST">
			<input type="text" placeholder="Username" name="username" required />
			<input type="password" placeholder="Password" name="password" required />
			<button type="submit" name="login">Login <i class="fa-solid fa-right-to-bracket"></i></button>
		</form>
		<div class="forgot">
			<a class="option" href="forgot-password.php">Forgot Password <i class="fa-solid fa-circle-question"></i></a>
		</div>
		<br />
		<p tabindex="0" style="margin-bottom: 10px;">Don't have an account?</p>
		<a class="option" href="register.php">Sign Up <i class="fa-solid fa-right-long"></i></a>
	</div>
</body>

</html>