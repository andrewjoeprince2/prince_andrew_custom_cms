<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();

if(isset($_POST['submit'])){
    $mcover = $_FILES['mcover'];
    $mtitle = trim($_POST['mtitle']);
    $mgenre = trim($_POST['mgenre']);
    $myear = trim($_POST['myear']);
    $mruntime = trim($_POST['mruntime']);
    $mstoryline = trim($_POST['mstoryline']);
    $mrelease = trim($_POST['mrelease']);

		if (empty($mcover['type']) || empty($mtitle) || empty($mgenre) || empty($myear) || empty($mruntime) || empty($mstoryline) || empty($mrelease) ) {
			$message = "Please enter all required fields.";
		}

		else {
		$result = createMovie($mcover, $mtitle, $mgenre, $myear, $mruntime, $mstoryline, $mrelease);
		$message = $result;
		}
	}

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
  <?php include('../includes/head.php'); ?>
  <title>Add Movie - Evil Corp</title>
  </head>

  <body id="adminIndex">

	<?php include('includes/header.php'); ?>


	<div class="row">
	<div class="small-12 columns" id="userForm">
	<h2>Add Movie</h2>
	<p>Complete this form to add a new movie to the database.</p>

	<?php if(!empty($message)){echo "<p class=\"error\"> $message</p>";} ?>
	<form action="admin_addmovie.php" method="post" enctype="multipart/form-data">

    <label>Movie Cover</label>
    <input type="file" name="mcover">

		<label>Movie Title</label>
		<input type="text" name="mtitle" value="">

    <label>Movie Genre:</label>
    <select name="mgenre">
      <option value="">Select Movie Genre</option>
      <option value="1">Comedy</option>
      <option value="2">Sci-Fi</option>
      <option value="3">Horror</option>
      <option value="4">Action</option>
      <option value="5">Drama</option>
    </select>

    <label>Movie Year</label>
    <input type="text" name="myear" value="">

    <label>Movie Runtime</label>
    <input type="text" name="mruntime" value="">

    <label>Movie Storyline</label>
    <textarea name="mstoryline" rows="5"></textarea>

    <label>Movie Release</label>
    <input type="text" name="mrelease" value="">


		<input type="submit" name="submit" value="Add Movie" class="submitBut">

	</form>
</div>
</div>

</body>
</html>
