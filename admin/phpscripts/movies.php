<?php

function createMovie($mcover, $mtitle, $mgenre, $myear, $mruntime, $mstoryline, $mrelease) {
  include('connect.php');

  //Image
  //use type cause it's an array. just check if it's returning anything
  if(!empty($mcover['type'])) {

      //ensure file path is acceptable
      if($mcover['type'] == "image/jpg" || $mcover['type'] == "image/jpeg"){

      //create path where you want image to go
      $mpath = $mcover['name'];

      $targetpath = "../images/{$mpath}";

      if(move_uploaded_file($mcover['tmp_name'], $targetpath)){
        //echo "File transfer complete";
        $th_copy = "../images/th_{$mpath}";
              if(!copy($targetpath, $th_copy)) {
                $message = "There was an error creating a thumbnail.";
                return $message;
              }

          }
        }
      }

      //Add movie to db
      $mpath = $mcover['name'];

      $moviestring = "INSERT INTO tbl_movies VALUES(NULL, '$mpath', '$mtitle', '$myear', '$mruntime', '$mstoryline', '', '$mrelease')";
  		//echo $moviestring;

  		$moviequery = mysqli_query($link, $moviestring);
  		if($moviequery) {

        //Add genre to linking table
        $linkinsertid = mysqli_insert_id($link);
        $linkstring = "INSERT INTO tbl_mov_genre VALUES(NULL, $mgenre, '$linkinsertid')";
        $linkquery = mysqli_query($link, $linkstring);

      	redirect_to('admin_movies.php');

      }else{
  			$message = "Error adding this movie. Please try again.";
  			return $message;
        //echo $moviestring;
  		}

      		mysqli_close($link);
}
//////////////////

function editMovie($movieid, $rmcover, $rmtitle, $rmgenre, $rmyear, $rmruntime, $rmstoryline, $rmrelease) {

    include('connect.php');

  //Image
  //use type cause it's an array. just check if it's returning anything
  if(!empty($rmcover['type'])) {

      //ensure file path is acceptable
      if($rmcover['type'] == "image/jpg" || $rmcover['type'] == "image/jpeg"){

      //create path where you want image to go
      $mpath = $rmcover['name'];

      $targetpath = "../images/{$mpath}";

      if(move_uploaded_file($rmcover['tmp_name'], $targetpath)){
        //echo "File transfer complete";
        $th_copy = "../images/th_{$mpath}";
              if(!copy($targetpath, $th_copy)) {
                $message = "There was an error creating a thumbnail.";
                return $message;
              }

          }
        }
      }

      $updateString = "UPDATE tbl_movies SET movies_title = '$rmtitle', movies_year = '$rmyear', movies_runtime = '$rmruntime', movies_storyline = '$rmstoryline', movies_release = '$rmrelease' WHERE movies_id = $movieid";

      $updateQuery = mysqli_query($link, $updateString);

      if($updateQuery) {
        redirect_to("admin_movies.php");
      } else {
        echo $updateString;
      }

      mysqli_close($link);
}

//////////////

function deleteMovie($id) {
include('connect.php');
$delstring = "DELETE FROM tbl_movies WHERE movies_id = {$id}";
$delquery = mysqli_query($link, $delstring);

$dellinkstr = "DELETE FROM tbl_mov_genre WHERE movies_id = {$id}";
$dellinkquery = mysqli_query($link, $dellinkstr);

if($delquery && $dellinkquery) {
  redirect_to("../admin_index.php");

}else {
  $message = "There was an error deleting this movie. Please try again.";
  return $message;
}

mysqli_close($link);
}
?>
