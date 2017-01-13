<?php
require_once 'conn.php';
if( isset($_SESSION['login']) && $_SESSION['login'] === true ) {
	header('Location: dashboard.php');
	exit;
}
if(isset( $_POST['login'])) {

	// prepare and bind
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$password = md5($password);

	$sql = "SELECT * FROM users WHERE email =  '$email' AND password = '$password'";
	$result = $conn->query($sql);

	if( $result->num_rows < 1 ) {
		die("SELECT * FROM users WHERE email =  '$email' AND password = '$password'");
		echo '<script type="text/javascript"> alert("Wrong login details.")</script>';		
		exit;
	}else {
		//create session
		mysqli_close($conn);
		$_SESSION['login'] = true;

		header('Location: dashboard.php');
		exit;
	}

}


?>
<!DOCTYPE html>
<head>
	<Title>Login Form</Title>
</head>

<body>
	<div style="width:70%;clear:left;margin:180px auto;">
		<section style="width:45%;float:left;border-right:1px solid #999;">
		<h1 style="font-family:sans-serif;font-size:28px;">Enter your LOGIN Details</h1>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
				<p><input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];}?>" required style="width:320px;height:30px;padding:5px;border:1px solid #C1C1C1;border-radius:5px"/></p>
				
				<p><input type="password" name="password" placeholder="Password" required style="width:320px;height:30px;padding:5px;border-radius:5px;border:1px solid #C1C1C1;"/></p>
				<p><input type="checkbox" name="remember" checked /> <label>Remember Me</label></p>
				
				<button type="submit" name="login" style="padding:20px 100px;color:#fff;background-color:#ed1c24;font-size:20px;border:0;cursor:pointer">Sign In</button>
			</form>
		</section>
		<section style="width:45%;float:right;text-align:center;font-family:sans-serif;">
			<h1 style="font-size:28px;">No Account Yet?</h1>
			<br><br>
			<a href="/register.php" style="padding:30px 80px;color:#fff;background-color:#23ca4e;text-decoration:none;font-size:20px">Register an Account</a>
		</section>
	</div>
</body>
</html>