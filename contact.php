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

							<!--Logout button&username -->
							
        					<a href="account.php"><i class="fa fa-user fa-2x" style="float: right;"></i></a>


					</header>
                    <hr>
				<!-- Menu -->
				<nav id="menu">
						<h2>Menu</h2>
						<ul>
						<li><a href="index.php" >Home</a></li>

						<li><a href="terms.php" >Terms</a></li>

						<li><a href="addTerm.php">Add term</a></li>

						<li><a href="contact.php" class="active">Contact Us</a></li>
						
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
                            <section>
							<h3 class="h3">About</h3>
							<small style="margin: 0">Project objective: creating a website for ATW.</small>
                            </section>
                            
                            <br><br>

                            <section>
							<h3 class="h3">Contact Us</h3>
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

