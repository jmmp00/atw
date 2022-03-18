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
                            $stmt = $conn->prepare(
                                "INSERT INTO user (name,surname,email,username,password) VALUES (?,?,?,?,?)"
                            );
                            $stmt->execute([
                                $name,
                                $surname,
                                $email,
                                $username,
                                $hash,
                            ]);
                            header("Location: login.php");
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
