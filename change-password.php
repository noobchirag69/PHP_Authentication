<?php
session_start();
if (!isset($_SESSION['id']) && !isset($_SESSION['username']) && !isset($_SESSION['loginemail'])) {
	header('Location: http://localhost/PHP_Authentication');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php $title = 'Change Password'; ?>
<?php include('partials/head.php'); ?>

<body>
	<?php include('partials/navbar.php') ?>
	<div tabindex="0" class="wrapper">
		<h1 tabindex="0">Change Password</h1>
		<form action="change-password-check.php" method="POST">
			<input type="password" placeholder="Old Password" name="password" required />
			<input type="password" placeholder="New Password" name="newPassword" required />
			<input type="password" placeholder="Confirm New Password" name="confirmNewPassword" required />
			<button type="submit" name="change">Submit</button>
		</form>
		<a class="option" href="dashboard.php">Back to Dashboard</a>
	</div>
</body>

</html>