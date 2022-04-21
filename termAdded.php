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
        include "db_conn.php"; 
        //$conn = mysqli_connect("localhost", "root", "admin", "atw");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $title =  $_POST['title'];
        $description = $_REQUEST['description'];
        $user=$_SESSION['user_username'];
        
        $verify = $conn->prepare(
            "SELECT * FROM terms WHERE title like ?"
        );
        $verify->execute([$title]);

        if ($verify->rowCount() >= 1) {
            echo "ERROR - term already exists";
        }else{
            $sql = "INSERT INTO terms  VALUES (NULL, '$title', '$description', current_timestamp(), '$user', NULL)";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>Submited with success!</h3>"; 
        } else{
            echo "ERROR: $sql. " 
                . mysqli_error($conn);
        }
        }
        
    
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