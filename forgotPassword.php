<?php 
  session_start();

  if (!isset($_SESSION['user_id'])) { 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="main">
      <section class="verify-email">
        <div class="container">
          <div class="signin-content">
            <div class="verify-email-form">
              <h2 class="form-title"><center>Forgot Password</center></h2>
              <form method="POST" class="register-form" id="login-form" action="auth.php"> 
              <center><div class="alert alert-success" role="alert" style="text-align:center">please insert your e-mail</div>  <center>
              <div class="form-group">
                  <label for="email">
                    <i class="zmdi zmdi-email"></i>
                  </label>
                  <input type="email" name="email" id="email" placeholder="Your Email"/>
                </div>
              <div class="form-group form-button">
                 <center> <input type="submit" name="forgotPassword" id="signin" class="form-submit" value="send code" /></center>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </body>
</html>
<?php 
}else {
   header("Location: login.php");
}
 ?>