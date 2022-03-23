<?php 
  session_start();

  if (!isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
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
              <h2 class="form-title"><center>Verify Email!</center></h2>
              <form method="POST" class="register-form" id="login-form" action="auth.php"> <?php if (isset($_GET['error'])) { ?> <div class="alert alert-danger" role="alert" style="display:block"> <?=htmlspecialchars($_GET['error']);?> </div> <?php  }elseif (isset($_GET['sucess'])){ ?>  <div class="alert alert-success" role="alert" style="display:block" id="resendSucess" style="display:block"> <?=htmlspecialchars($_GET['sucess']);?> </div> <?php  } ?>
              <div class="alert alert-success" role="alert" id="emailSent" style="display:block">We've sent a verification code to your email - <?php echo htmlspecialchars($_SESSION['user_email']);?></div>  
              <div class="form-group">
              <label for="your_name">
                    <i class="zmdi zmdi-check-square"></i>
                  </label>
                  <input type="text" name="token" />
                </div>
                <div class="form-group form-button">
                 <center> 
                   <input type="submit" name="verify" class="form-submit" value="verify" />
                   <input type="submit" name="resend" class="form-submit" value="resend code" />
                  </center>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script> if (document.querySelector('.alert-danger').style.display == 'block'){
                  document.querySelector('#emailSent').style.display = 'none';
          
              }
              if (document.querySelector('#resendSucess').style.display == 'block'){
                document.querySelector('#emailSent').style.display = 'none';
              }
              </script>
  </body>
</html>
<?php 
}else {
   header("Location: login.php");
}
 ?>