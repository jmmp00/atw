<?php 
	session_start();
  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 

	$db = mysqli_connect('localhost', 'root', 'admin', 'atw');

	// initialize variables
    $id=$_GET['id'];
    $query="DELETE FROM terms WHERE id='$id'";
    mysqli_query($db, $query);
    mysqli_close ($db);
    header("location: index.php");

}else {
   header("location: login.php");
}
 ?>
