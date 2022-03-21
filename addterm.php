<?php 
 session_start();

  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Add a new term</title>
</head>
  
<body>
    <center>
        <h1>Add a new term to the website:</h1>
  
        <form action="add.php" method="post">
                          
<p>
                <label for="title">Title</label>
                <input type="text" name="title" id="title">
            </p>
<p>
                <label for="description">Description</label>
                <input type="text" name="description" id="description">
            </p>
  
  
  
              
            <input type="submit" value="Submit">
        </form>
    </center>
</body>
  
</html>


<?php 
}else {
   header("location: login.php");
}
 ?>
