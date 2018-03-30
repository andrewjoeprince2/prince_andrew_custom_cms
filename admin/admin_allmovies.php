<?php
	require_once('phpscripts/config.php');
	require_once('phpscripts/connect.php');
	confirm_logged_in();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
  <?php include('../includes/head.php'); ?>
  <title>All Movies - Evil Corp</title>
  </head>

  <body id="adminIndex">

	<?php include('includes/header.php'); ?>

  <section class="row">
    <div class="small-12 columns">
      <h2>All Movies <a href="admin_addmovie.php"><span class="addBut" alt="Add Movie">+</span></a></h2>

      <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-5 movieList">

        <?php

        //Recent Movies
          $queryRecent = "SELECT * FROM tbl_movies ORDER BY movies_title asc";
          $runRecent = mysqli_query($link, $queryRecent);

          while($row = mysqli_fetch_array($runRecent)){
            $subStory = substr("{$row['movies_storyline']}", 0, 70);
            $mid = $row['movies_id'];

						//Linking 

            echo "
            <li>
            <img src=\"../images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
            <h2>{$row['movies_title']} ({$row['movies_year']})</h2>
            <h3>{$row['movies_runtime']} | {$row['movies_release']}</h3>
            <p>{$subStory}... <a href=\"admin_editmovie.php?id={$mid}\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a></p>
            </li>
            ";
          }
        ?>

      </ul>
      <a href="admin_addmovie.php"><button class="submitBut">Add Movie</button></a>

    </div>
  </section>



</body>
</html>
