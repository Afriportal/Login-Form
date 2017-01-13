<?php
require_once 'conn.php';

if( !isset($_SESSION['login']) || $_SESSION['login'] !== true ) {
	header('Location: dashboard.php');
	exit;
}

?>
<!DOCTYPE html>
<head>
	<Title>Dash Board</Title>
</head>

<body>
	<div style="border:2px solid #ececec;padding:50px;width:400px;margin:0 auto;text-align:center;">
		<h1>Welcome to the dash Board
	</div>
</body>
</html>