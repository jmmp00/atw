<?php 
 session_start();

  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 
?>

<!DOCTYPE html>
<html>
  
<head>
    <title>New term added!</title>
</head>
  
<body>
    <center>
        <?php
  
        $conn = mysqli_connect("localhost", "root", "admin", "atw");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $name =  $_REQUEST['name'];
        $surname = $_REQUEST['surname'];
        $username=$_SESSION['username'];
        $email=$_SESSION['email'];
        $password=$_SESSION['password'];
        $accountType=$_SESSION['accountType'];
          
        // Performing insert query execution
        $sql = "INSERT INTO user  VALUES (NULL, '$name', '$surname', '$email', '$username', '$password', NULL, , '$accountType')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>Submited with success!</h3>"; 
        } else{
            echo "ERROR: $sql. " 
                . mysqli_error($conn);
        }
        // Close connection
        mysqli_close($conn);
        ?>


    <a href="index.php">  
       <button>Home page</button>  
    </a>
    <a href="terms.php">  
       <button>Term page</button>  
    </a>
    <a href="javascript:history.back()">
        <button>Go Back</button>
    </a>  
    </center>
</body>
  
</html>


<?php 
}else {
   header("location: login.php");
}
 ?>