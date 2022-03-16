<?php 
session_start();
include 'db_conn.php';
if (isset($_POST['login'])){
	if (isset($_POST['password']) && isset($_POST['userInfo'])) {
		function checkEmail($email) {
			$find1 = strpos($email, '@');
			$find2 = strpos($email, '.');
			return ($find1 !== false && $find2 !== false && $find2 > $find1);
		}
		$userInfo = $_POST['userInfo'];
		$password = $_POST['password'];
		if(checkEmail($userInfo)){
			$userType = "email";
		}else{
			$userType = "username";
		}
		
		if (empty($userInfo)) {
			header("Location: login.php?error=username or email is required");
		}else if (empty($password)){
			header("Location: login.php?error=Password is required&".$userType."=$userInfo");
		}else {
			$stmt = $conn->prepare("SELECT * FROM user WHERE ". $userType ."=?");
			$stmt->execute([$userInfo]);
			
			if ($stmt->rowCount() === 1) {
				$user = $stmt->fetch();
				$user_id = $user['ID'];
				$user_username= $user['username'];
				$user_email = $user['email'];
				$user_password = $user['password'];
				$user_name = $user['name'];
				$user_surname = $user['surname'];
				if ($userInfo === $userInfo) {
					if (password_verify($password, $user_password)) { 
						if(isset($_POST['remember-me'])){
							setcookie('USERINFO', $userInfo, time() + 60*60*24*30);
							setcookie('PASSWORD', $password, time() + 60*60*24*30);
						}
						$_SESSION['user_id'] = $user_id;
						$_SESSION['user_email'] = $user_email;
						$_SESSION['user_name'] = $user_name;
						$_SESSION['user_surname'] = $user_surname;
						header("Location: index.php");
					}else {
						header("Location: login.php?error=Incorect ".$userType." or password&username=$userInfo");

					}
				}else {
					header("Location: login.php?error=Incorect ".$userType." or password&".$userType."=$userInfo");
				}
			}else {
				header("Location: login.php?error=Incorect ".$userType." or password&".$userType."=$userInfo");
			}
		}
	}
}

if (isset($_POST['register'])){
	if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])){
		$username = $_POST['username'];
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬-]/', $username)){
			header("Location: register.php?error=Username cannot contain special characters");
		}else{
		$email = $_POST['email'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$hash = password_hash($password, PASSWORD_DEFAULT);
		echo $hash;
		if (empty($email)) {
			header("Location: login.php?error=Email is required");
		}else if (empty($password)){
			header("Location: login.php?error=Password is required&email=$email");
		}else {
			$stmt = $conn->prepare("INSERT INTO user (name,surname,email,username,password) VALUES (?,?,?,?,?)");
			$stmt->execute([$name,$surname,$email,$username,$hash]);
		}
		header("Location: index.php");	
	}
	}
}