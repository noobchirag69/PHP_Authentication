<!DOCTYPE html>
<html lang="en">

<?php $title = 'Register'; ?>
<?php include('partials/head.php'); ?>

<body>
	<?php include('partials/navbar.php') ?>
	<div tabindex="0" class="wrapper">
		<h1 tabindex="0">Register</h1>
		<form action="register-check.php" method="POST">
			<input type="text" placeholder="Username" name="username" required />
			<input type="email" placeholder="Email Address" name="loginemail" required />
			<input type="password" placeholder="Password" name="password" required />
			<input type="password" placeholder="Confirm Password" name="confirmPassword" required />
			<button type="submit" name="register">Sign Up</button>
		</form>
		<p tabindex="0" style="margin-bottom: 10px;">Already have an account?</p>
		<a class="option" href="index.php">Login</a>
	</div>
</body>

</html>