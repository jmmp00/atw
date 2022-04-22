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
            $sql = $conn->prepare(
                "INSERT INTO terms  VALUES (NULL, ?, ?, current_timestamp(), ?, NULL)"
            );
            $sql->execute([$title,$description,$user]);
        
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
