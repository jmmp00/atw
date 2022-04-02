<?php 
 session_start();

  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 
?>

<html>

	<head>
		<title>My Account</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
<body>
<!-- Admin -->
<a href='mgmt.php' class='button'>Admin pannel</a>

<!--Logout button&username -->
<a href="index.php" class="button" style="position:absolute; right: 172px; top: 10px;font-size: 1rem">HOME</a>
<a href="logout.php" class="button" style="position:absolute; right: 10px; top: 10px;font-size: 1rem">LOGOUT</a>
<a href="" class="button" style="position:absolute; right: 10px; top: 80px; font-size: 1rem">CHANGE PASSWORD</a>

</body>

</html>

<?php 
}else {
   header("location: login.php");
}
 ?>