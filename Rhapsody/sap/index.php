<?php
require_once("dbconnect.php");

$show = NULL;
$aid = NULL;

$name = $email = $mobile = $college = $branch = $year = $location = $sap = $promote = $marketing = $fb = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = clean_input($_POST['fname']);
	$email = clean_input($_POST['email']);
	$mobile = clean_input($_POST['mobile']);
	$college = clean_input($_POST['college']);
	$branch = clean_input($_POST['branch']);
	$year = clean_input($_POST['year']);
	$location = clean_input($_POST['location']);
	$sap = clean_input($_POST['sap']);
	$promote = clean_input($_POST['promote']);
	$marketing = clean_input($_POST['marketing']);
	$fb = clean_input($_POST['fb']);

	if (rpHash($_POST['defaultReal']) == $_POST['defaultRealHash']) {
		$query = mysql_query("SELECT email FROM stuAmbassador WHERE email = '$email'") or die(mysql_error());
		if (mysql_num_rows($query)==0) {
			mysql_query("INSERT INTO stuAmbassador (name, email, mobile, college, branch, year, location, sap, promote, marketing, fb, timestamp) VALUES ('$name', '$email', '$mobile', '$college', '$branch', '$year', '$location', '$sap', '$promote', '$marketing', '$fb', now())") or die(mysql_error());
			$aquery = mysql_query("SELECT uid FROM stuAmbassador WHERE email = '$email'");
			$afetch = mysql_fetch_assoc($aquery);
			$newName = strtoupper(substr($name,0,3));
			$newUid = 1610+$afetch['uid'];
			$aid = "SAP-".$newName.$newUid;
			echo $aid;
			mysql_query("UPDATE stuAmbassador SET aid = '$aid' WHERE email = '$email'") or die(mysql_error());
			/*$to = $email;
			$subject = "Rhapsody (Pravaah) Student Ambassador Program";
			$message = "Dear".$name.",\nYou have successfully registered in the Student Ambassador Program for the Socio-Cultural Fest, Rhapsody organised under Pravaah, The Golden Jubille Festival by Indian Institute of Technology Roorkee, Saharanpur Campus from March 7-9th, 2014. Your Ambassador Id is ".$aid.". Please use this id as reference in all the mails or any sort of contact you make with us. For more details ping us on info@pravaah.org.\nOur team will get back to you soon, meanwhile follow us on facebook (http://www.facebook.com/pravaahIITRSre), twitter(http://twitter.com/GoldenPravaah).\n\nRegards,\nTeam Rhapsody'14";
			$from = "info@pravaah.org";
			$headers = "From:" . $from;
			mail($to,$subject,$message,$headers);*/
			$show = "accepted";
		}else{
			$show = "rejected";
		}
	}else{
		$show = "incorrect";
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="realperson.css">
		<style type="text/css">
			.rejected, .incorrect, .accepted { padding: 0.5em; display: none; border: 2px solid rgba(200,0,0,0.5);  background: rgba(200,0,0,0.5); border-radius: 8px; font-size: 12px; margin: auto; width: 370px; text-align: center; }
			.accepted { border: 2px solid rgba(0,150,0,0.5);  background: rgba(0,150,0,0.5); }
			textarea{ width: 200px; height: 70px; resize: none; border-radius: 8px; }
			input{ width: 200px; border-radius: 8px; }
			body{background-image: url('bg.jpg'); width: 100%; height: 100%; background-size: 100%; color: #fff; overflow-x: hidden; }
			#heading{text-align: center;}
			#wrapper, #text{background: rgba(0,0,0,0.5); float: left; margin-left: 50px; border-radius: 20px; padding: 5px 20px;}
			#wrapper{ width: 600px; }
			#text{ width: 500px; margin-right: 50px; font-size: 0.8em; }
		</style>
		<script type="text/javascript" src="jquery.1.8.3.min.js"></script>
		<script type="text/javascript" src="realperson.js"></script>
		<script type="text/javascript">
		$(function() {
				$('#defaultReal').realperson({length: 7, includeNumbers: true});
		});
		</script>
	</head>
	<body>
		<div id="heading"><h2>Pravaah Student Ambassador Program</h2></div>
		<div class="accepted">You have successfully enrolled for Rhapsody Student Ambassador Program. Your Ambassador ID is <?php echo $aid; ?>.<br /> Please check your mailbox.</div>
		<div class="rejected">Oops! The email address you registered has already been registered.</div>
		<div class="incorrect">Oops! The text you entered did not match with the captcha text.</div>
		<div id="wrapper">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
				<table>
					<tr><td><label for="fname">Name:</label></td><td><input type="text" name="fname" /></td></tr>
					<tr><td><label for="email">Email:</label></td><td><input type="email" name="email" /></td></tr>
					<tr><td><label for="mobile">Mobile No.:</label></td><td><input type="tel" name="mobile" /></td></tr>
					<tr><td><label for="college">College:</label></td><td><input type="text" name="college" /></td></tr>
					<tr><td><label for="branch">Branch:</label></td><td><input  type="text" name="branch" /></td></tr>
					<tr><td><label for="year">Year:</label></td><td><input type="text" name="year" /></td></tr>
					<tr><td><label for="location">Location:</label></td><td><input type="text" name="location" /></td></tr>
					<tr><td>Why do you think you are suitable for our <br /><i>&quot;Student Ambassador Program&quot;</i>?</td><td><textarea name="sap"></textarea></td></tr>
					<tr><td>How will you promote <i>Pravaah</i> at your college?</td><td><textarea name="promote"></textarea></td></tr>
					<tr><td>Past experiences with Marketing / Promotions</td><td><textarea name="marketing"></textarea></td></tr>
					<tr><td><label for="fb">Facebook Profile Link:</label></td><td><input type="url" name="fb" /></td></tr>
					<tr><td>Please enter the Captcha</td><td><br /><input type="text" id="defaultReal" name="defaultReal" /></td></tr>
					<tr><td></td><td align="center"><input type="submit" value="Submit" name="submit" style="width:100px;" /></td></tr>
				</table>
			</form>
		</div>

		<div id="text">
			<p style="text-align:justify;">Leadership and team co-ordination are indispensable qualities in any walk of life. Pravaah, under its <i><b>Student Ambassador Programme</b></i> gives you a golden opportunity to cultivate these attributes by representing your college at Pravaah in general, and the socio-cultural festival Pravaah in particular, by becoming the face of your college team. Under this programme we intend to have a student ambassador from each college who would be required to do the following work-</p>
			
			<p><ul>
				
				<li><b>Publicity:-</b> Publicize the socio-cultural festival Rhapsody in his or her campus by co-ordinating the putting up of posters on the notice boards and at important locations in his or her campus.</li>

				<li><b>Online Marketing:-</b> With the student ambassador would lie the responsibility of publicizing the Facebook page of Pravaah by making an active effort to get as many likes as possible from the students of his or her college. He or she must also post the link to the Facebook pages/groups of his respective college and get the likes on the Pravaah page done from there.</li>

				<li><b>Letter from the HOD/Dean/Director:-</b> The student ambassador would be required to get a letter of confirmation from the HOD/Dean/Director of his or her institute confirming that the college would be willing to send a participation team for the socio-cultural festival Rhapsody.</li>

				<li><b>Contingent Leader:-</b> The Student Ambassador would be the contingent leader of his college team coming to participate in a myriad of cultural competitions and unique events under Rhapsody and would co-ordinate the entire team.</li>

			</ul></p>

			<p>The Student Ambassadors stand to gain the following advantages by associating with us:-</p>

			<p><ul>
			
				<li><b>Recognition:-</b> The coveted Student Ambassador Certificate and Letter of Recommendation.</li>

				<li><b>Exposure:-</b> Hands on experience of Institutional level co-ordination, fest organization, team work, event management and public relations.</li>

				<li><b>Bragging Rights:-</b> Credit yourself as Student Ambassador in your email-signatures, linkedIn profile, blogs, personal pages, etc.</li>
			
			</ul></p>
			<p align="center">Download <a href="sap.pdf" target="_blank" style="color:#ccc; text-decoration: none; ">here</a></p>
		</div>

		<div style="position: fixed; bottom: 10px; right: 10px; font-size:12px; background: rgb(0,0,0); padding: 3px 5px; border-radius:8px;">&copy; Copyrights <a href="http://www.pravaah.org" target="_blank" style="color:#ccc; text-decoration: none; ">Pravaah.org</a> | <a href="http://www.facebook.com/abhas.mittal7" target="_blank" style="color:#ccc; text-decoration: none; ">Abhas Mittal</a></div>

		<?php
		if ($show == "accepted") {
			echo "<script type='text/javascript'>$('.accepted').show();</script>";
		}elseif ($show == "rejected") {
			echo "<script type='text/javascript'>$('.rejected').show();</script>";
		}elseif ($show == "incorrect") {
			echo "<script type='text/javascript'>$('.incorrect').show();</script>";
		}
		?>
		
	</body>
</html>