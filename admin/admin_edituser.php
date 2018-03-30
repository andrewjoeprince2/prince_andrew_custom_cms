<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	confirm_logged_in();
	$id = $_SESSION['user_id'];
	//echo $id;
	$tbl = "tbl_user";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	$found_user = mysqli_fetch_array($popForm, MYSQLI_ASSOC);


	if(isset($_POST['submit'])) {
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);

		$passwordVal = $_POST['password'];
    $password = password_hash($passwordVal, PASSWORD_BCRYPT, ['cost => 11']);
    $passwordcon = $_POST['passwordcon']; //Didn't trim the passwords because I'm ensuring that they have to match exactly. trim removes the whitespace, which may not always be ideal in passwords

		$email = trim($_POST['email']);

    if($passwordVal === $passwordcon) {
      $result = editUser($fname, $username, $password, $email, $id);
  		$message = $result;
  } else {
	   $message = "Your passwords do not match.";
	}
}


?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
  <?php include('../includes/head.php'); ?>
  <title>Dashboard - Evil Corp</title>
  </head>

  <body id="adminIndex">

	<?php include('includes/header.php'); ?>


	<div class="row">
	<div class="small-12 columns" id="userForm">
	<h2>Edit Profile</h2>
	<p>Edit your account information here.</p>

	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_edituser.php" method="post">
	<label>First Name:</label>
	<input type="text" name="fname" value="<?php echo $found_user['user_fname']; ?>">

	<label>Username:</label>
	<input type="text" name="username" value="<?php echo $found_user['user_name']; ?>">

	<label>New Password:</label>
	<input type="password" name="password" value="">

  <label>Confirm New Password:</label>
	<input type="password" name="passwordcon" value="">

	<label>Email:</label>
	<input type="text" name="email" value="<?php echo $found_user['user_email']; ?>">
	<input type="submit" name="submit" value="Edit Account" class="submitBut">

	</form>
    </div>
  </div>

</body>
</html>
