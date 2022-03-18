<?php 
 session_start();

  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Term page</title>
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
									<span class="title">Website title</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>
							<!-- Logout button-->
							<div style="min-height: 1vh;">
        					<i class="fa fa-user" aria-hidden="true" style="float: right;"></i><h1 class="text-right display-6" style="margin-top: -40px; font-size: 1rem"><?=$_SESSION['user_name'] . " ".$_SESSION['user_surname']?>&nbsp;</h1>
        					<a href="logout.php" class="button" style="position:absolute; right:100px; top:20px;font-size: 1rem">LOGOUT</a>
							</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.php">Home</a></li>

							<li><a href="terms.php" class="active">Terms</a></li>

							<li><a href="contact.php">Contact Us</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>Terms</h1>

							<div class="image main">
								<img src="images/banner-image-3-1920x500.jpg" class="img-fluid" alt="" />
							</div>
							
							<div class="container-fluid">
								<div class="row">
									<div class="col-9">
										<div class="row">
											<div class="col-sm-6 text-center">
												<h2 class="m-n"><a href="blog-post.html">Title.</a></h2>

												<p> Author &nbsp;|&nbsp; Date</p>
											</div>

											<div class="col-sm-6 text-center">
												<h2 class="m-n"><a href="blog-post.html">Title.</a></h2>

												<p> Author &nbsp;|&nbsp; Date</p>
											</div>

											<div class="col-sm-6 text-center">
												<h2 class="m-n"><a href="blog-post.html">Title.</a></h2>

												<p> Author &nbsp;|&nbsp; Date</p>
											</div>

											<div class="col-sm-6 text-center">
												<h2 class="m-n"><a href="blog-post.html">Title.</a></h2>

												<p> Author &nbsp;|&nbsp; Date</p>
											</div>

											<div class="col-sm-6 text-center">
												<h2 class="m-n"><a href="blog-post.html">Title.</a></h2>

												<p> Author &nbsp;|&nbsp; Date</p>
											</div>

											<div class="col-sm-6 text-center">
												<h2 class="m-n"><a href="blog-post.html">Title.</a></h2>

												<p> Author &nbsp;|&nbsp; Date</p>
											</div>
										</div>
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

				                    </div>
								</div>
							</div>
						</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<ul class="icons">
									<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
								</ul>

								&nbsp;
							</section>

							<ul class="copyright">
								<li>Copyright © 2020 Company Name </li>
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



