<?php
session_start();
if(isset($_GET['logout'])){
	unset($_SESSION['admin']);
	session_destroy();
	header("Location: index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username == "abhas" && $password == "rhapsody14"){
			$_SESSION['admin'] = "abhas";
			header("Location: home.php");
		}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login | SAP</title>
</head>
<style type="text/css">
	#container{
		width: 300px;
		margin: auto;
		height: 200px;
		box-shadow: 10px 10px 4px #999;
		border-radius: 18px;
		border: 1px solid #999;
		text-align: center;
	}
	input{
		border-radius: 3px;
	}
</style>
<body>
<br /><br /><br /><br /><br /><br /><br /><br />
<div id="container">
<br />
	<h3>Admin Interface Login</h3>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<input type="text" name="username" placeholder="Username" /><br />
		<input type="password" name="password" placeholder="Password" /><br />
		<input type="submit" />
	</form>
</div>
</body>
</html>
