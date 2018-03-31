<?php
	require_once('phpscripts/config.php');
	require_once('phpscripts/connect.php');
	confirm_logged_in();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
  <?php include('../includes/head.php'); ?>
  <title>Dashboard - Evil Corp</title>
  </head>

  <body id="adminIndex">

	<?php include('includes/header.php'); ?>

  <section class="row">
    <div class="small-12 columns">
      <h2>Recently Added Movies <a href="admin_addmovie.php"><span class="addBut" alt="Add Movie">+</span></a></h2>

      <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-5 movieList">

        <?php
        //Recent Movies
          $queryRecent = "SELECT * FROM tbl_movies ORDER BY movies_id DESC LIMIT 5";
          $runRecent = mysqli_query($link, $queryRecent);

          while($row = mysqli_fetch_array($runRecent)){
            $subStory = substr("{$row['movies_storyline']}", 0, 70);
            $mid = $row['movies_id'];

            //Linking

            $linkstring = "SELECT * FROM tbl_movies, tbl_genre, tbl_mov_genre WHERE tbl_genre.genre_id = tbl_mov_genre.genre_id AND tbl_movies.movies_id = tbl_mov_genre.movies_id AND tbl_movies.movies_id = $mid";
            $linkquery = mysqli_query($link, $linkstring);
            $foundgenre = mysqli_fetch_array($linkquery, MYSQLI_ASSOC);
            $genre = $foundgenre['genre_name'];

            echo "
            <li><a href=\"admin_movie.php?id={$mid}\">
            <img src=\"../images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
            <h3>{$genre}</h3>
            <h2>{$row['movies_title']} ({$row['movies_year']})</h2>
            <h3>{$row['movies_runtime']} | {$row['movies_release']}</h3>
            <p>{$subStory}... <a href=\"admin_editmovie.php?id={$mid}\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a></p>
            </a></li>
            ";
          }
        ?>

      </ul>
      <a href="admin_allmovies.php"><button class="submitBut">View All Movies</button></a>
      <a href="admin_addmovie.php"><button class="submitBut">Add Movie</button></a>

    </div>
  </section>



</body>
</html>
