<?php 
 session_start();

  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Contact Us</title>
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
                                <!-- Logout button-->
                                <div style="min-height: 1vh;">
        			    		    <i class="fa fa-user" aria-hidden="true" style="float: right;"></i><h1 class="text-right display-6" style="margin-top: -40px; font-size: 1rem"><?=$_SESSION['user_name'] . " ".$_SESSION['user_surname']?>&nbsp;</h1>
        			    		    <a href="logout.php" class="button" style="position:absolute; right:100px; top:20px;font-size: 1rem">LOGOUT</a>
							    </div>
						</div>
					</header>
                    <hr>
				<!-- Menu -->
				<nav id="menu">
						<h2>Menu</h2>
						<ul>
						<li><a href="index.php" >Home</a></li>

						<li><a href="terms.php" >Terms</a></li>

						<li><a href="addterm.php">Add term</a></li>

						<li><a href="contact.php" class="active">Contact Us</a></li>
						
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
                            <section>
							<h3 style="margin: 0">About</h3>
							<small style="margin: 0">Project objective: creating a website for ATW.</small>
                            </section>
                            
                            <br><br>

                            <section>
							<h3 style="margin: 0">Contact Us</h3>
							<form method="post" action="#">
								<div class="fields">
									<div class="field half">
										<input type="text" name="name" id="name" placeholder="Name" />
									</div>

									<div class="field half">
										<input type="text" name="email" id="email" placeholder="Email" />
									</div>

									<div class="field">
										<input type="text" name="subject" id="subject" placeholder="Subject" />
									</div>

									<div class="field">
										<textarea name="message" id="message" rows="3" placeholder="Message"></textarea>
									</div>

									<div class="field text-right">
										<label>&nbsp;</label>

										<ul class="actions">
											<li><input type="submit" value="Send" class="primary" /></li>
										</ul>
									</div>
								</div>
							</form>
						    </section>
                            
                            
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

