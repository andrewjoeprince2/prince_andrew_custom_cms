<?php
	require_once('phpscripts/config.php');
  require_once('phpscripts/connect.php');
	confirm_logged_in();

  $movieid = $_GET['id'];

//Run Query for movie id, specific id (get)
$queryMovie = "SELECT * FROM tbl_movies WHERE movies_id = {$movieid}";
$runMovie = mysqli_query($link, $queryMovie);


//Link

$linkstring = "SELECT * FROM tbl_movies, tbl_genre, tbl_mov_genre WHERE tbl_genre.genre_id = tbl_mov_genre.genre_id AND tbl_movies.movies_id = tbl_mov_genre.movies_id AND tbl_movies.movies_id = $movieid";
$linkquery = mysqli_query($link, $linkstring);
$foundgenre = mysqli_fetch_array($linkquery, MYSQLI_ASSOC);
$genre = $foundgenre['genre_id'];
$gname = $foundgenre['genre_name'];
$linkid = $foundgenre['mov_genre_id'];

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


?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
  <?php include('../includes/head.php'); ?>
  <title><?php echo $mtitle?> - Evil Corp Movies</title>
  </head>

  <body id="adminIndex">

	<?php include('includes/header.php'); ?>


	<div class="row">
	<div class="small-12 columns">
  <h2><?php echo "{$mtitle} ({$myear})" ?></h2>
    <div class="row">
    <div class="small-12 medium-6 columns">
    <img src="../images/<?php echo $mcover?>" alt="<?php echo $mtitle?>">
    <br><br>
    <a href="admin_allmovies.php"><button class="submitBut">Back to Movies</button></a>
    </div>

    <div class="small-12 medium-6 columns">
      <h3>Genre: <?php echo $gname ?></h3>
      <h3>Runtime: <?php echo $mruntime ?></h3>
      <h3>Released On: <?php echo $mrelease ?></h3>
      <h3>Storyline:</h3>
      <p><?php echo $mstoryline ?></p>
      <a href="admin_editmovie.php?id=<?php echo $movieid ?>"><button class="submitBut">Edit Movie</button></a>
    </div>
    </div>
</div>
</div>

</body>
</html>
