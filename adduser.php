<?php 
 session_start();

  if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { 
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Add a new user</title>
</head>
  
<body>
    <center>
        <h1>Add a new user to the website:</h1>
  
        <form action="addu.php" method="post">
                          
            <p>
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </p>

            <p>
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname">
            </p>

            <p>
                <label for="username">Username</label>
                <input type="username" name="username" id="username">
            </p>

            <p>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </p>

            <p>
                <label for="password">Password</label>
                <input type="text" name="password" id="password">
            </p>

            <p>
                <label for="accountType">Account Type</label>
                <input type="text" name="accountType" id="accountType">
            </p>


            <input type="submit" value="Submit">
        </form>
        <br>
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