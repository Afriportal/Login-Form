<?php
require_once 'conn.php';
if( isset($_SESSION['login']) && $_SESSION['login'] === true ) {
	header('Location: dashboard.php');
	exit;
}
if(isset($_POST['register'])) {

	// prepare and bind
	$stmt = $conn->prepare("INSERT INTO users (name, email, password , reg_date) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss", $name, $email, $password, $reg_date);

	// Do necessary sanitation and validation
	// set parameters and execute
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$password = md5($password);
	$reg_date = date('Y-m-d H:i:s');

	if( $stmt->execute() ) {
		echo '<script type="text/javascript"> alert("Hello '. ucfirst($name). '. Click okay to login!"); window.location = "login.php"</script>';
		exit;
	}else {
		echo '<script type="text/javascript"> alert("Registration failed.")</script>';
		exit;
	}

	// close connection
	mysqli_close($conn);
}

?>
<!DOCTYPE html>
<head>
	<Title>Registration Form</Title>
</head>

<body>
	<div style="">
		<section style="border:2px solid #ececec;padding:50px;width:400px;margin:0 auto;text-align:center;">
		<h1 style="font-family:sans-serif;font-size:28px;">Create an Account</h1>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
				<p><input type="text" name="name" placeholder="Full Name" required style="width:320px;height:30px;padding:5px;border:1px solid #C1C1C1;border-radius:3px"/></p>
				
				<p><input type="email" name="email" placeholder="Email" required style="width:320px;height:30px;padding:5px;border:1px solid #C1C1C1;border-radius:3px"/></p>
				
				<p><input type="password" name="password" placeholder="Password" required style="width:320px;height:30px;padding:5px;border:1px solid #C1C1C1;border-radius:3px"/></p>
				<br>
				<button type="submit" name="register" style="padding:15px 100px;color:#fff;background-color:#23ca4e;font-size:20px;border:0;cursor:pointer">Create Account</button>
			</form>
		</section>
	</div>
</body>
</html>