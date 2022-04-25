<?php 
	session_start();
    if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])&& isset($_SESSION['user_level']) && $_SESSION['user_level'] == 1) { 

	$db = mysqli_connect('localhost', 'root', 'admin', 'atw');

	// initialize variables
    $parent=$_REQUEST['parent'];
    $child=$_REQUEST['child'];
    $query="DELETE FROM relations WHERE parent = '$parent' AND child = '$child'";
    mysqli_query($db, $query);
    mysqli_close ($db);
    header("location: relationships.php");

}else {
   header("location: login.php");
}
 ?>
