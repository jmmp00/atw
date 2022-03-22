<?php
session_start();
include "db_conn.php";  
include_once 'template.php';
if (isset($_POST["login"])) {
    if (isset($_POST["password"]) && isset($_POST["userInfo"])) {
        function checkIfEmail($email)
        {
            $find1 = strpos($email, "@");
            $find2 = strpos($email, ".");
            return $find1 !== false && $find2 !== false && $find2 > $find1;
        }
        $userInfo = $_POST["userInfo"];
        $password = $_POST["password"];
        if (checkIfEmail($userInfo)) {
            $userType = "email";
        } else {
            $userType = "username";
        }

        if (empty($userInfo)) {
            header("Location: login.php?error=username or email is required");
        } elseif (empty($password)) {
            header(
                "Location: login.php?error=Password is required&" .
                    $userType .
                    "=$userInfo"
            );
        } else {
            $stmt = $conn->prepare(
                "SELECT * FROM user WHERE " . $userType . "=?"
            );
            $stmt->execute([$userInfo]);

            if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch();
                $user_id = $user["ID"];
                $user_username = $user["username"];
                $user_email = $user["email"];
                $user_password = $user["password"];
                $user_name = $user["name"];
                $user_surname = $user["surname"];
                $user_status = $user["status"];
                echo $user_status;
                echo $userInfo;
                echo $user_email;
                if ($userInfo == $user_email || $userInfo == $user_username) {
                    if (password_verify($password, $user_password)) {
                        echo $user_status;
                        if($user_status == 1){
                            echo $user_status;

                        
                        if (isset($_POST["remember-me"])) {
                            setcookie(
                                "USERINFO",
                                $userInfo,
                                time() + 60 * 60 * 24 * 30
                            );
                        }
                        $_SESSION["user_id"] = $user_id;
                        $_SESSION["user_email"] = $user_email;
                        $_SESSION["user_name"] = $user_name;
                        $_SESSION["user_surname"] = $user_surname;
                        $_SESSION["user_username"] = $user_username;
                        header("Location: index.php");
                        }else{
                            header(
                                "Location: noToken.php"
                            );
                        }
                    } else {
                        header(
                            "Location: login.php?error=Incorect " .
                                $userType .
                                " or password&username=$userInfo"
                        );
                    
                
            }
                } else {
                    header(
                        "Location: login.php?error=Incorect " .
                            $userType .
                            " or password&" .
                            $userType .
                            "=$userInfo"
                    );
                }
            } else {
                header(
                    "Location: login.php?error=Incorect " .
                        $userType .
                        " or password&" .
                        $userType .
                        "=$userInfo"
                );
            }
        }
    }
}

if (isset($_POST["register"])) {
    if (
        isset($_POST["email"]) &&
        isset($_POST["password"]) &&
        isset($_POST["username"])
    ) {
        if (isset($_POST["agree-term"])) {
            $username = $_POST["username"];
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬-]/', $username)) {
                header(
                    "Location: register.php?error=Username cannot contain special characters"
                );
            } else {
                $email = $_POST["email"];
                $name = $_POST["name"];
                $surname = $_POST["surname"];
                $username = $_POST["username"];
                $re_password = $_POST["re_pass"];
                $password = $_POST["password"];
                $hash = password_hash($password, PASSWORD_DEFAULT);
                if (empty($email)) {
                    header("Location: register.php?error=Email is required");
                } elseif (empty($password)) {
                    header(
                        "Location: register.php?error=Password is required&email=$email"
                    );
                } else {
                    if ($password != $re_password) {
                        header(
                            "Location: register.php?error=Passwords must match"
                        );
                    } else {
                        $stmt = $conn->prepare(
                            "SELECT * FROM user WHERE email=?"
                        );
                        $stmt->execute([$email]);
                        $stm = $conn->prepare(
                            "SELECT * FROM user WHERE username=?"
                        );
                        $stm->execute([$username]);
                        if ($stmt->rowCount() >= 1) {
                            header(
                                "Location: register.php?error=Email already exists"
                            );
                        } elseif ($stm->rowCount() >= 1) {
                            header(
                                "Location:  register.php?error=Username already exists"
                            );
                        } else {
                            
                            $token = generateRandomString(7);
                            $stmt = $conn->prepare(
                                "INSERT INTO user (name,surname,email,username,password,token) VALUES (?,?,?,?,?,?)"
                            );
                            $stmt->execute([
                                $name,
                                $surname,
                                $email,
                                $username,
                                $hash,
                                $token,
                            ]);
                            $_SESSION["user_email"] = $email; 
                            setcookie(
                                "TOKEN",
                                true,
                                time() + 60 * 60 * 24 * 30
                            );                        
                            sendEmail($email,$token);
                            header("Location: verifyEmail.php");
                        }
                    }
                }
            }
        }else{
			header(
				"Location:  register.php?error=You must agree to the terms and conditions"
			);
		}
    }
}

if (isset($_POST["verify"])) {
    if (isset($_POST["token"])) {
    $email = $_SESSION['user_email'];
    $token = $_POST["token"];
    $stmt = $conn->prepare(
        "SELECT token FROM user WHERE email=?"
    );
    $stmt->execute([$email]);
    $result = $stmt->fetch();
    $db_token = $result["token"];
    if($token == $db_token){
        $stmt = $conn->prepare(
            "UPDATE atw.user SET status = 1 WHERE email = ?"
        );
        $stmt->execute([$email]);
        $stm = $conn->prepare(
            "UPDATE atw.user SET token = NULL WHERE email = ?"
        );
        $stm->execute([$email]);
        header("Location:  login.php");
    }else if($token == "" || $token == " "){
        header(
            "Location:  verifyEmail.php?error=Please insert the code before submiting"
            );
    }else{
        header(
            "Location:  verifyEmail.php?error=The code doesn't match"
            );
    }
}
}


if (isset($_POST["noToken"])) {
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        $stmt = $conn->prepare(
            "SELECT * FROM user WHERE email=?"
        );
        $stmt->execute([$email]);
  
        if ($stmt->rowCount() >= 1) {
            $token = generateRandomString(7);
            $stm = $conn->prepare(
                "UPDATE atw.user SET token = ? WHERE email = '$email'"
            );
            $stm->execute([$token]);
            if ( false===$stmt ) {
                echo'prepare() failed: ' . htmlspecialchars($conn->error);
            }
            sendEmail($email,$token);
            $_SESSION["user_email"] = $email; 
            header("Location: verifyEmail.php");
        }   
    }
}

if (isset($_POST["resend"])) {
        $email = $_SESSION["user_email"];
        $stmt = $conn->prepare(
            "SELECT token FROM user WHERE email=?"
        );
        $stmt->execute([$email]);
        if ($stmt->rowCount() >= 1) {
            $result = $stmt->fetch();
            $token = $result['token'];
            sendEmail($email,$token);
            header("Location: verifyEmail.php?sucess=The code has been resent to your email");
        }   
}

function sendEmail($email,$token){
    $_SESSION["user_token"] = $token;
    ini_set("SMTP", "smtp.server.com");//confirm smtp
    $to = $email;  
    $subject = "Test mail";  
    $message = "Hello! This is a simple email message.";  
    $from = "pedrofiliperocha2001@gmail.com";  
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    $text = Template::get_contents("template.html", array('token' => $token));
    mail($to, $subject, $text, $headers); 
}
function generateRandomString($length = 25) { // function to generate random string
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}