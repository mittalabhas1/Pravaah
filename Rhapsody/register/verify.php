<?php
require_once 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Verify your Email Address - Rhapsody 2014</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (isset($_GET['email']) && isset($_GET['verify'])) {
		$email = $_GET['email'];
		$verify = $_GET['verify'];
		$hashed = newHash($email);
		if ($verify == $hashed) {
			$query = mysqli_query($con, "SELECT verified FROM users WHERE email = '$email'");
			$fetch = mysqli_fetch_assoc($query);
			if ($fetch['verified'] == 0) {
				mysqli_query($con, "UPDATE users SET verified=1 WHERE email= '$email'");
			?>
			<div id="mycontent"><h4>Congratulations ! You have successfully verified your email address with Rhapsody.</h4></div>
			<?php
			}else{
				echo "<div id='mycontent' style='margin-top:50px;'>This email is already verified!<br /><script type='text/javascript'>window.location.href = 'index.php'</script></div>";
			}
		}else{
			echo "<div id='mycontent' style='margin-top:50px;'>The email couldn't be verified successfully. Make sure the link you entered is correct !</div>";
		}
	}
}
?>
<a href="http://rhapsody.pravaah.org">Visit Website</a>
</body>
</html>