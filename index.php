<?php 
include 'auth.php' ;

  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 
		
?>

<html>
	<head>
		<title>Home page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>

	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

					<header id="header">
						
						<div class="inner">
							<!--Logo -->
								<a href="index.php" class="logo">
								<center><span class="title">Scrabble</span><span class="fa fa-pencil"></span></center>
								</a>
							<!--Nav-->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

        					<a href="account.php"><i class="fa fa-user fa-2x" style="float: right;"></i></a>

						</div>

					</header> 
				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
						<li><a href="index.php" class="active">Home</a></li>
						<li><a href="terms.php" >Terms</a></li>
						<li><a href="addTerm.php">Add term</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<br>
						<div class="inner">
                        <h3 class="h3">Latest terms posted&nbsp;<i class="fa fa-level-down"></i></h3>
							<br>
							
							<div class="container-fluid">
								<div class="row">
									<div class="col-9">
										<div class="row">
                                                <?php
												$conn = mysqli_connect("localhost", "root", "admin", "atw");
												if ($conn-> connect_error){
   													die("Connection failed:". $conn-> connect_error);
												}

												$sql= "SELECT * FROM `terms` ORDER BY id DESC LIMIT 4;" ;
												$result= $conn-> query($sql);
												while ($row= $result-> fetch_assoc()){
													
												$id=$row['id'];
													echo '<div class="col-sm-6 text-center">';
     												echo '<h2>', $row["title"], '</a></h2>';
     												echo $row["description"];
													echo "<br>";
      												echo "<p>", $row["username"], "&nbsp;|&nbsp;", $row["timestamp"], "</p>";
													echo "</div>";
												}	
												$conn-> close();										 
												?>
											

											
										</div>
                                        <p class="text-center">
                                            <a href="terms.php">Read More &nbsp;
												<i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </p>
									</div>


									<div class="col-3">
										<!-- Search bar-->
										<form action="search.php" method="POST">
											<input type="text" name="search" placeholder="Search for a Term">
											<button type="submit" name="submit-search" style="margin-left:190px; margin-top:-55px;"><i class="fa fa-search"></i></button>
										</form>
				                    </div>

								</div>
							</div>
						</div>
					</div>

				<!-- Footer -->
                <footer id="footer">
						<div class="inner">
							
							<section>
								<h2>Contact Info</h2>

								<ul class="alt">
									<li><span class="fa fa-envelope-o"></span> <a href="#">email@example.com</a></li>
									<li><span class="fa fa-phone"></span> phone number </li>
									<li><span class="fa fa-map-pin"></span> address </li>
								</ul>
							</section>

							<ul class="copyright">
							<li>Copyright © 2022 Company Name </li>
							<li>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>


<?php 
}else {
   header("location: login.php");
}
 ?>