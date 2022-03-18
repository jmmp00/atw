<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="main">
      <section class="signup">
        <div class="container">
          <div class="signup-content">
            <div class="signup-form">
              <h2 class="form-title">Sign up</h2>
              <form method="POST" class="register-form" id="register-form" action="auth.php"> <?php if (isset($_GET['error'])) { ?> <div class="alert alert-danger" role="alert"> <?=htmlspecialchars($_GET['error'])?> </div> <?php } ?> <div class="form-group">
                  <label for="name">
                    <i class="zmdi zmdi-account material-icons-name"></i>
                  </label>
                  <input type="text" name="name" id="name" placeholder="Your Name" />
                </div>
                <div class="form-group">
                  <span id="nameError"></span>
                </div>
                <div class="form-group">
                  <label for="surname">
                    <i class="zmdi zmdi-account material-icons-name"></i>
                  </label>
                  <input type="text" name="surname" id="surname" placeholder="Your Surname" />
                </div>
                <div class="form-group">
                  <span id="surnameError"></span>
                </div>
                <div class="form-group">
                  <label for="username">
                    <i class="zmdi zmdi-account material-icons-name"></i>
                  </label>
                  <input type="text" name="username" id="username" placeholder="Your Username" />
                </div>
                <div class="form-group">
                  <span id="usernameError"></span>
                </div>
                <div class="form-group">
                  <label for="email">
                    <i class="zmdi zmdi-email"></i>
                  </label>
                  <input type="email" name="email" id="email" placeholder="Your Email" value="
															<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>" />
                </div>
                <div class="form-group">
                  <span id="emailError"></span>
                </div>
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
                <div class="form-group">
                  <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                  <label for="agree-term" class="label-agree-term">
                    <span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a>
                  </label>
                </div>
                <div class="form-group form-button">
                  <input disabled type="submit" style= "cursor:not-allowed" name="register" id="signup" class="form-submit" value="Register" onclick=check() />
                </div>
              </form>
            </div>
            <div class="signup-image">
              <figure>
                <img src="images/signup-image.jpg" alt="sing up image">
              </figure>
              <a href="login.php" class="signup-image-link">I am already member</a>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script type="text/javascript" src="formControl.js"></script>
  </body>
</html>