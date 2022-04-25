<?php 
	session_start();
  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])&& isset($_SESSION['user_level']) && $_SESSION['user_level'] == 1) { 

	$db = mysqli_connect('localhost', 'root', 'admin', 'atw');

	// initialize variables
    $query="DELETE FROM user WHERE id=$_GET[id]";
    mysqli_query($db, $query);
    mysqli_close ($db);
    header("location: mgmt.php");

}else {
   header("location: login.php");
}
 ?>
