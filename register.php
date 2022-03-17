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
                        <form method="POST" class="register-form" id="register-form" action="auth.php">
						<?php if (isset($_GET['error'])) { ?>
	  					<div class="alert alert-danger" role="alert">
			  			<?=htmlspecialchars($_GET['error'])?>
						</div>
		    			<?php } ?>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
							<div class="form-group">
                                <label for="surname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="surname" id="surname" placeholder="Your Surname"/>
                            </div>
							<div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Username"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <span id="result"></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

						</div>
                        <script>
                            let name = document.querySelector('#name');
                            let surname = document.querySelector('#surname');
                            let username = document.querySelector('#username');
                            let email = document.querySelector('#email');
                            let pass1 = document.querySelector('#pass');
                            let pass2 = document.querySelector('#re_pass');
                            let result = document.querySelector('#result');
                            let button = document.querySelector('#signup');

                            function checkPassword () {
                                if (pass2.value ==""){
                                    result.innerText = "";
                                }else{
                                    result.innerText = pass1.value == pass2.value ? 'Passwords match' : 'Passwords do not match';
                                    result.value = pass1.value == pass2.value ? '1' : '0';
                                    result.style.color = pass1.value == pass2.value ? 'green' : 'red';
                                    button.disabled = pass1.value == pass2.value ? false : true;
                                    button.style.cursor = pass1.value == pass2.value ? 'pointer' : 'not-allowed';
                                }                
                            }
                            pass1.addEventListener('keyup', () => {
                            if (pass2.value.length != 0) checkPassword();
                            })
                            pass2.addEventListener('keyup', checkPassword);
                        </script>


	  
</body>
</html>
