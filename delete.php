<?php 
 session_start();

  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 
?>

<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'admin', 'atw');

	// initialize variables
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM user WHERE id='$id'");
        header('location: mgmt.php');
    }

    ?>

<html>
<head></head>
<body><p>Deleted</p></body>
</html>

<?php 
}else {
   header("location: login.php");
}
 ?>