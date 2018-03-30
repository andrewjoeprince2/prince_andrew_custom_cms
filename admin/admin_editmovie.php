<?php
	require_once('phpscripts/config.php');
  require_once('phpscripts/connect.php');
	confirm_logged_in();

  $movieid = $_GET['id'];

//Run Query for movie id, specific id (get)
$queryMovie = "SELECT * FROM tbl_movies WHERE movies_id = {$movieid}";
$runMovie = mysqli_query($link, $queryMovie);

if(mysqli_num_rows($runMovie)){
  $foundmovie = mysqli_fetch_array($runMovie, MYSQLI_ASSOC);

//Movie specific Variables
  $mcover = $foundmovie['movies_cover'];
  $mtitle = $foundmovie['movies_title'];
  $myear = $foundmovie['movies_year'];
  $mruntime = $foundmovie['movies_runtime'];
  $mstoryline = $foundmovie['movies_storyline'];
  $mrelease = $foundmovie['movies_release'];
}

if(isset($_POST['submit'])){
    $rmcover = $_FILES['mcover'];
    $rmtitle = addslashes($_POST['mtitle']);
    $rmgenre = addslashes($_POST['mgenre']);
    $rmyear = addslashes($_POST['myear']);
    $rmruntime = addslashes($_POST['mruntime']);
    $rmstoryline = addslashes($_POST['mstoryline']);
    $rmrelease = addslashes($_POST['mrelease']);

		if (empty($rmcover['type']) || empty($rmtitle) || empty($rmgenre) || empty($rmyear) || empty($rmruntime) || empty($rmstoryline) || empty($rmrelease) ) {
			$message = "Please enter all required fields.";
		}

		else {

		$result = editMovie($movieid, $rmcover, $rmtitle, $rmgenre, $rmyear, $rmruntime, $rmstoryline, $rmrelease);
		$message = $result;
	}
	}

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
  <?php include('../includes/head.php'); ?>
  <title>Edit Movie - Evil Corp</title>
  </head>

  <body id="adminIndex">

	<?php include('includes/header.php'); ?>


	<div class="row">
	<div class="small-12 columns" id="userForm">
  <h2><?php echo $mtitle ?></h2>

	<?php if(!empty($message)){echo "<p class=\"error\"> $message</p>";} ?>
	<form action="admin_editmovie.php?id=<?php echo $movieid ?>" method="post" enctype="multipart/form-data">



    <label>Movie Cover</label>
    <input type="file" name="mcover" value="">

		<label>Movie Title</label>
		<input type="text" name="mtitle" value="<?php echo $mtitle ?>">

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
    <input type="text" name="myear" value="<?php echo $myear ?>">

    <label>Movie Runtime</label>
    <input type="text" name="mruntime" value="<?php echo $mruntime ?>">

    <label>Movie Storyline</label>
    <textarea name="mstoryline" rows="5"><?php echo $mstoryline ?></textarea>

    <label>Movie Release</label>
    <input type="text" name="mrelease" value="<?php echo $mrelease ?>">


		<input type="submit" name="submit" value="Edit Movie" class="submitBut">

	</form>
  <a href="phpscripts/caller.php?caller_id=deletemovie&id=<?php echo $movieid?>"><button class="deleteBut">Delete Movie</button></a>
</div>

</div>

</body>
</html>
