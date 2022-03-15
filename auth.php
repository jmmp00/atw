<?php 
session_start();
include 'db_conn.php';
if (isset($_POST['login'])){
if (isset($_POST['email']) && isset($_POST['password'])) {
	
	$email = $_POST['email'];
	echo $email;
	$password = $_POST['password'];
	echo $password;
	if (empty($email)) {
		header("Location: login.php?error=Email is required");
	}else if (empty($password)){
		header("Location: login.php?error=Password is required&email=$email");
	}else {
		$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
		$stmt->execute([$email]);
		

		if ($stmt->rowCount() === 1) {
			$user = $stmt->fetch();

			$user_id = $user['id'];
			$user_email = $user['email'];
			$user_password = $user['password'];

			if ($email === $user_email) {
				if (password_verify($password, $user_password)) {
					$_SESSION['user_id'] = $user_id;
					$_SESSION['user_email'] = $user_email;
					$_SESSION['user_full_name'] = $user_full_name;
					header("Location: index.php");

				}else {
					//logiheader("Location: n.php?error=Incorect User name or p1&email=$email");
					echo $password;
					echo $user_password;
				}
			}else {
				header("Location: login.php?error=Incorect User name or p2&email=$email");
			}
		}else {
			header("Location: login.php?error=Incorect User name or p3&email=$email");
		}
	}
}
}

if (isset($_POST['register'])){
	if (isset($_POST['email']) && isset($_POST['password'])) {
	
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
	}
}