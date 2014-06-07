<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: index.php");
}
require_once("../dbconnect.php");
$query = mysql_query("SELECT * FROM stuAmbassador WHERE 1 ORDER BY uid ASC");
?>
<!DOCTYPE html>
<html>
<head>
<title>SAP Admin Interface</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/page.css" />
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
</head>

<body>
<a id="logout" href="index.php?logout=1">Logout</a>
<h1>List of Registered Candidates</h1>
<br /><br />
<div id="results">
	<table id="table1" border="0" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>SrNo</th>
				<th style="width:100px;">Ambassador Id</th>
				<th>Name and Details</th>
				<th>College</th>
				<th>Location</th>
				<th>Why are you eligible?</th>
				<th>How will you promote?</th>
				<th>Past Experiences</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($fetch = mysql_fetch_assoc($query)) {
		?>
			<tr>
				<td class="uid"><?php echo $fetch['uid']; ?></td>
				<td class="aid"><?php echo $fetch['aid']; ?></td>
				<td>
					<div class="name">
						<h3><?php echo $fetch['name']; ?></h3>
						<ul class="bottom_zero">
							<li class="url"><?php echo $fetch['email']; ?></li>
							<li class="url"><?php echo $fetch['mobile']; ?></li>
							<li class="url"><?php echo $fetch['year'].", ".$fetch['branch']; ?></li>
							<li class="url"><a href="<?php echo $fetch['fb']; ?>" target="_blank" class="url">Facebook</a></li>
						</ul>
					</div>
				</td>
				<td class="college"><?php echo $fetch['college']; ?></td>
				<td class="location"><?php echo $fetch['location']; ?></td>
				<td class="sap"><?php echo $fetch['sap']; ?></td>
				<td class="promote"><?php echo $fetch['promote']; ?></td>
				<td class="marketing"><?php echo $fetch['marketing']; ?></td>
			</tr>
		<?php
		}
		?>
		</tbody>
	</table>
</div>
<script type="text/javascript" src="popup.js"></script>
</body>
</html>
