<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	confirm_logged_in();

  $token = $_SESSION['user_id'];

	$tbl = "tbl_user";
	$users = getAll($tbl);
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
	<h2>Manage Users</h2>
	<p>Accounts on this system are listed below. Please get rid of excess baggage. Budget cuts are hitting us hard this year...</p>

  <table>
    <tbody>
      <tr>
      <td>Name</td>
      <td>Username</td>
      <td>Email</td>
      <td>User Level</td>
      <td>IP Address</td>
      <td>Last Login</td>
      <td>Action</td>
      </tr>
	<?php
		while($row = mysqli_fetch_array($users)){
			echo "

      <tr>
      <td>{$row['user_fname']}</td>
      <td>{$row['user_name']}</td>
      <td>{$row['user_email']}</td>
      <td>{$row['user_level']}</td>
      <td>{$row['user_ip']}</td>
      <td>{$row['user_last_login']}</td>
      <td>
      <a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i> Delete</a>";
      if($row['user_id'] === $token) {
        echo "<br><br>
              <a href=\"admin_edituser.php\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> Edit</a>
              ";
      }
      echo "
      </td>
      </tr>
      ";
		}
	?>

      </tbody>
    </table>

  </div>
</div>

</body>
</html>
