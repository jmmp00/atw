<?php
session_start();
include "db_conn.php";
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
                if ($userInfo === $userInfo) {
                    if (password_verify($password, $user_password)) {
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
                            function generateRandomString($length = 25) { // function to generate random string
                                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $charactersLength = strlen($characters);
                                $randomString = '';
                                for ($i = 0; $i < $length; $i++) {
                                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                                }
                                return $randomString;
                            }
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
                            
                            ini_set("SMTP", "smtp.server.com");//confirm smtp
                            $to = $email; //$_SESSION["email"];
                            $subject = "Validation Token";
                            $message = "validate your e-mail with this code: " . $token;
                            $from = "pedrofiliperocha2001@gmail.com";
                            $headers = "From: $from";
                            mail($to,$subject,$message,$headers);
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