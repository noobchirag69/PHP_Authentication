<?php
session_start();
if (!isset($_SESSION['id']) && !isset($_SESSION['username']) && !isset($_SESSION['loginemail'])) {
	header('Location: http://localhost/PHP_Authentication');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php $title = 'Delete Account'; ?>
<?php include('partials/head.php'); ?>

<body>
	<?php include('partials/navbar.php') ?>
	<div tabindex="0" class="wrapper">
		<h1 tabindex="0">Delete Account</h1>
		<form action="delete-account-check.php" method="POST">
            <label for="password">If you're sure you want to delete your account, please type your password to confirm deletion.</label>
			<input type="password" id="password" placeholder="Password" name="password" required />
			<button type="submit" name="delete">Delete <i class="fa-solid fa-trash"></i></button>
		</form>
		<a class="option" href="dashboard.php"><i class="fa-solid fa-left-long"></i> Back to Dashboard</a>
	</div>
</body>

</html>