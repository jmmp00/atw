<?php 
  session_start();

  if (!isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
    if(!isset( $_SESSION['user_changePassword'])){
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
              <h2 class="form-title"><center>Verify code!</center></h2>
              <form method="POST" class="register-form" id="login-form" action="auth.php"> 
              <center><div class="alert alert-success" role="alert" style="text-align:center">We've sent a verification code to your email - <?php echo htmlspecialchars($_SESSION['user_email']);?></div>  <center>
              <div class="form-group">      
                  <input type="text" name="code"/>
                </div>
              <div class="form-group form-button">
                 <center> <input type="submit" name="changePassword" id="signin" class="form-submit" value="verify" /></center>
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
    }else if (isset( $_SESSION['user_changePassword'])){
      ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose a new password</title>
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
              <h2 class="form-title"><center>Choose a new password!</center></h2>
              <form method="POST" class="register-form" id="login-form" action="auth.php"> <?php if (isset($_GET['error'])) { ?> <div class="alert alert-danger" role="alert"> <?=htmlspecialchars($_GET['error'])?> </div> <?php } ?> <div class="form-group">
              <center><div class="alert alert-success" role="alert" style="text-align:center">Choose a new password</div>  <center>
              <div class="form-group">
                  <label for="pass">
                    <i class="zmdi zmdi-lock"></i>
                  </label>
                  <input type="password" name="password" id="pass" placeholder="Password" />
                </div>
                <div class="form-group">
                  <label for="re-pass">
                    <i class="zmdi zmdi-lock-outline"></i>
                  </label>
                  <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                </div>
                <div class="form-group">
                  <span id="passError"></span>
                </div>
              <div class="form-group form-button">
                 <center> <input type="submit" name="updatePassword" id="signup" class="form-submit" value="change password" /></center>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script type="text/javascript" src="formControl.js"></script>
  </body>
</html>


      <?php
    }
}else {
   
}
 ?>