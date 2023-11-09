<?php
session_start();
if (!isset($_SESSION['id']) && !isset($_SESSION['username']) && !isset($_SESSION['loginemail'])) {
	header('Location: http://localhost/PHP_Authentication');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php $title = 'Dashboard'; ?>
<?php include('partials/head.php'); ?>

<body>
	<?php include('partials/navbar.php') ?>
	<div tabindex="0" class="welcome">
		<h1 tabindex="0">Welcome to your Dashboard!</h1>
		<div class="welcome-options">
			<a class="option" href="logout.php" onclick="return confirm('Log out of the current session?');">Logout <i class="fa-solid fa-right-from-bracket"></i></a>
			<a class="option" href="change-password.php">Change Password <i class="fa-solid fa-circle-question"></i></a>
		</div>
		<div class="table-container">
			<table tabindex="0">
				<tr tabindex="0">
					<td tabindex="0" class="heading">Username</td>
					<td tabindex="0"><?php echo $_SESSION['username']; ?></td>
				</tr>
				<tr tabindex="0">
					<td tabindex="0" class="heading">Email <i class="fa-solid fa-envelope"></i></td>
					<td tabindex="0"><?php echo $_SESSION['loginemail']; ?></td>
				</tr>
			</table>
		</div>
	</div>
</body>

</html>