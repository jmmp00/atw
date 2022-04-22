<?php 
session_start();

if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 

	$db = mysqli_connect("localhost", "root", "admin", "atw");
	if ($db-> connect_error){
		die("Connection failed:". $db-> connect_error);
	}	
?>

<html>
	<head>
		<title>My Account</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	</head>
<body>
<div><center>
<!-- Admin -->
<?php if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 1) {
echo("<a href='mgmt.php' class='button' style='position:absolute; right: 455px; top: 110px;'>Admin pannel</a>");
}?>

<!--Logout button&username -->
<a href="index.php" class="button" style="position:absolute; right: 455px; top: 10px;">HOME</a>
<a href="logout.php" class="button" style="position:absolute;  top: 10px;">LOGOUT</a>
<a href="" class="button" style="position:absolute;  top: 60px;">CHANGE PASSWORD</a>
</center></div>
<br>
<br>
<br>
<br>
<div class="container" style="position:absolute; top:160px; left:150px;">
    <div class="row">
		<br>
		<br>
		
    		<div class="span3 well">
        	<center>


			<img src="images/f1.png" name="aboutme" width="140" height="140" class="img-circle"><br>
			<p><b>Welcome back!</b></p>
			<p>You're logged in using an <?php if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 1) {
echo("<b>Admin</b>");
} else { echo ("<b>User</b>"); }?> account. </p>
			
			
			</center>
			</div>
	</div>
</div>


</body>

</html>

<?php 
}else {
   header("location: login.php");
}
 ?>