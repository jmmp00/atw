<?php 
 session_start();

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

				<!-- Header -->
					<header id="header">
						<div class="inner">
							<!-- Logo -->
								<a href="index.php" class="logo">
								<span class="title">Scrabble</span><span class="fa fa-pencil"></span>
								</a>
							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

							<!-- Logout button&username -->
							<div style="min-height: 1vh;">
        					<i class="fa fa-user" aria-hidden="true" style="float: right;"></i><h1 class="text-right display-6" style="margin-top: -40px; font-size: 1rem">
							<?=$_SESSION['user_name'] . " ".$_SESSION['user_surname']?>&nbsp;</h1>
        					<a href="logout.php" class="button" style="position:absolute; right:100px; top:20px;font-size: 1rem">LOGOUT</a>
							</div>
					</header>
				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
						<li><a href="index.php" class="active">Home</a></li>

						<li><a href="terms.php" >Terms</a></li>

						<li><a href="addterm.php">Add term</a></li>

						<li><a href="mgmt.php">Manage users</a></li>

						<li><a href="contact.php">Contact Us</a></li>
						
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						  </ol>
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img class="d-block w-100" src="images/slider-image-1.jpg" alt="First slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="images/slider-image-2.jpg" alt="Second slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="images/slider-image-3.jpg" alt="Third slide">
						    </div>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
					</div>

						<br>
						<br>
						<div class="inner">
                        <h3 class="h3">Latest terms posted&nbsp;<i class="fa fa-level-down"></i></h3>
							<br>
							
							<div class="container-fluid">
								<div class="row">
									<div class="col-9">
										<div class="row">
											<div class="col-sm-6 text-center">
                                                <?php
												$conn = mysqli_connect("localhost", "root", "admin", "atw");
												if ($conn-> connect_error){
   													die("Connection failed:". $conn-> connect_error);
												}

												$sql= "SELECT * FROM `terms` ORDER BY id DESC LIMIT 5;" ;
												$result= $conn-> query($sql);
												while ($row= $result-> fetch_assoc()){
													
												$id=$row['id'];
     												echo '<h2><a href="'. $id .'.php">', $row["title"], '</a></h2>';
     												echo $row["description"];
													echo "<br>";
      												echo "<p>", $row["username"], "&nbsp;|&nbsp;", $row["timestamp"], "</p>";
												}	
												$conn-> close();										 
												?>
											</div>

											
										</div>
                                        <p class="text-center">
                                            <a href="terms.php">Read More &nbsp;<i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </p>
									</div>


									<div class="col-3">
										<div class="form-group">
                                        <h4>Search for a term</h4>
				                        </div>

										<div class="form-group">
				                            <div class="input-group">
				                                <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">

				                                <span class="input-group-addon"><a href="#"><i class="fa fa-search"></i></a></span>
				                            </div>
				                        </div>

				                        <br>

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
									<li><span class="fa fa-envelope-o"></span> <a href="#">contact@company.com</a></li>
									<li><span class="fa fa-phone"></span> +1 333 4040 5566 </li>
									<li><span class="fa fa-map-pin"></span> 212 Barrington Court New York, ABC 10001 United States of America</li>
								</ul>

								<h2>Follow Us</h2>

								<ul class="icons">
									<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
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