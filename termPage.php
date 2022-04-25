<?php 
include 'auth.php' ;

  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 
		
?>

<html>
	<head>
		<title>Term page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
						<li><a href="index.php" >Home</a></li>
						<li><a href="terms.php" >Terms</a></li>
						<li><a href="addTerm.php">Add term</a></li>
						<?php if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 1) {
							echo("<li><a href='relationships.php'>Manage relationships</a></li>");
						}?>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<br>
						<div class="inner">
                        <h3 class="h3">Term Page</i></h3>
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
												$id=mysqli_real_escape_string($conn, $_GET['id']);
												$sql= "SELECT * FROM terms WHERE id='$id'";
												$result= $conn-> query($sql);
												while ($row= $result-> fetch_assoc()){
													
												$id=$row['id'];
													echo '<div class="col-sm-6 text-center">';
													echo '<h2>', $row["title"];
													if ( $row['verification'] == "1" ) { ?> 
													   <span class="fa fa-check"></span> 
													  <?php }	
													echo '</h2>';
     												echo $row["description"];
													echo "<br>";
      												echo "<p>", $row["username"], "&nbsp;|&nbsp;", $row["timestamp"], "</p>";
													echo "<br>";
													echo '</div>';
												}		
																					 
												?>

<?php if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 1) {
	echo "<div>";
echo("<a href='editT.php?id=" . $id . "class='edit'><i class='material-icons edit'>&#xe3c9;</i></a>");
echo "<br><br>";
echo "<span data-toggle='modal' data-target='#modalApagar" . $_GET['id'] . "'>" . "<i class='material-icons'>&#xE5C9;</i>" . "</span>";
echo "</div>";
}?>



<!-- Modal -->

<div id="modalApagar<?PHP echo $_GET['id']?>" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><strong>Delete</strong></h4>
      </div>
      <div class="modal-body">
        
	  <p>Are you sure you want to <b>permenantly delete</b> this term?</p>
      
      </div>
      <div class="modal-footer">
<div class="btn-group">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <a type="button" class="btn btn-danger" href="deleteT.php?id=<?PHP echo $_GET["id"]?>">Yes</a>
</div>
      </div>
    </div>

  </div>
</div>


<div class="col-9">
<div class="row">
<?php
//if parent 
$pid=mysqli_real_escape_string($conn, $_GET['id']);
$sql= "SELECT * FROM relations WHERE parent='$pid'";
$result= $conn-> query($sql);
$row_numb= mysqli_num_rows($result);
if($row_numb != 0){
	echo '<h5 class="h5">Related Terms:</h5>';
	echo '<br>';}
while ($row= $result-> fetch_assoc()){												
	$cid= $row["child"];
		
	$sql2= "SELECT * FROM terms WHERE id='$cid'";
	$result2= $conn-> query($sql2);
	$row2= $result2-> fetch_assoc();

		if($row2){
			echo "<h6><a href='termPage.php?id=".$row2["id"]."'>", $row2["title"], '</a>';
			echo '</h6>';	
			} 
			
		}
			



?>

</div></div>

                

											
	</div>
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