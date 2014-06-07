<?php
session_start();
$con = mysql_connect("182.50.133.175", "aditi7", "jQuery7!");
mysql_select_db("aditi7", $con);
date_default_timezone_set('Asia/Kolkata');
$clear = date("d/m/Y H:i:s");

if (isset($_POST['submit1'])) {
	mysql_query("UPDATE tasks SET completed = '$_POST[completed]', time2 = '$clear' WHERE day = '$_POST[day]'") or die(mysql_error());
	
	$file = fopen("aditi.txt","a");
	fwrite($file,$clear."\r\nCompleted: ".$_POST['day']." - ".$_POST['completed']."\r\n\r\n");
	fclose($file);
	header('Location: index.php');
}

if (isset($_POST['submit2'])) {
	$query = mysql_query("INSERT INTO tasks SET day = '$_POST[day]', planned = '$_POST[planned]', time1 = '$clear'");

	$file = fopen("aditi.txt","a");
	fwrite($file,$clear."\r\nPlanned: ".$_POST['day']." - ".$_POST['planned']."\r\n\r\n");
	fclose($file);
	header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CS Calender</title>
	<style type="text/css">
	.form{
		margin: 10px auto 30px;
		width: 300px;
		border: 1px solid #333;
		box-shadow: 4px 4px 4px #555;
		border-radius: 5px;
		padding: 10px 50px;
	}
	table{
		width: 100%;
	}
	td{
		width: 50%;
	}
	.heading{
		text-align: center;
		font-weight: bold;
		font-size: 18px;
	}
	#details{
		width: 960px;
		margin: auto;
	}
	#details td{
		text-align: center;
	}
	.srno{
		width: 5%;
	}
	.day{
		width: 15%;
	}
	.planned{
		width: 40%;
	}
	#links{
		position: absolute;
		top: 10px;
		width: 100%;
		left: 10px;
	}
	</style>
</head>
<body>

<!--Links section starts here-->
<div id="links">
	<a href="POA.txt" target="_blank">Plan of Action</a><br />
	<a href="aditi.txt" target="_blank">Check your Log</a>
</div>

<!--Completed form starts here-->
<div class="form">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<div class="heading">Completed Task</div>
		<table>
			<tr>
				<td>Today's Date</td>
				<td><input type="date" name="day" /></td>
			</tr>
			<tr>
				<td>Update</td>
				<td><textarea placeholder="What's your update today naughty girl?" name="completed"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit1" value="Submit" /></td>
			</tr>
		</table>
	</form>
</div>

<!--Planned form starts here-->
<div class="form">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<div class="heading">Planned Task</div>
		<table>
			<tr>
				<td>Planned Date</td>
				<td><input type="date" name="day" /></td>
			</tr>
			<tr>
				<td>Update</td>
				<td><textarea placeholder="What's your update today naughty girl?" name="planned"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit2" value="Submit" /></td>
			</tr>
		</table>
	</form>
</div>

<!--Summary starts here-->
<div id="details">
	<table border="1">
		<tr>
			<td class="srno">Sr.No</td>
			<td class="day">Date</td>
			<td class="planned">Planned Study</td>
			<td class="planned">Completed</td>
		</tr>
		<?php
		$i = 1;
		$query = mysql_query("SELECT * FROM tasks WHERE 1");
		while ($fetch = mysql_fetch_assoc($query)) { ?>
		<tr>
			<td class="srno"><?php echo $i++; ?></td>
			<td class="day"><?php echo $fetch['day']; ?></td>
			<td class="planned"><?php echo $fetch['planned']; ?></td>
			<td class="planned"><?php echo $fetch['completed']; ?></td>
		</tr>
		<?php }
		?>
	</table>
</div>
</body>
</html>