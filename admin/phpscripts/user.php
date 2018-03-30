<?php

	function createUser($fname, $username, $password, $email, $lvllist, $randomPass) {
		include('connect.php');
		$userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', '{$lvllist}', 'no', 'Not Set', 'Not set', '0', '$randomPass' )";
		//echo $userstring;

		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			redirect_to('admin_index.php');
		}else{
			$message = "This guy sucks.";
			return $message;
		}
				mysqli_close($link);
	}

	function editUser($fname, $username, $password, $email, $id) {
		include('connect.php');

		$updateString = "UPDATE tbl_user SET user_fname = '$fname', user_name = '$username', user_pass = '$password', user_email = '$email' WHERE user_id = $id";
		//echo $userString;
		$updateQuery = mysqli_query($link, $updateString);
		if($updateQuery) {
			redirect_to("admin_index.php");
		}
		else {
			$message = "There was a problem updating this user. Please contact the site admin.";
			return $message;
		}
		mysqli_close($link);
	}

	function deleteUser($id) {
	include('connect.php');
	$delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";

	$delquery = mysqli_query($link, $delstring);

	if($delquery) {
		redirect_to("../admin_index.php");

	}else {
		$message = "Bye, bye...";
		return $message;
	}

	mysqli_close($link);
}


?>
