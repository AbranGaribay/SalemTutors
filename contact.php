<?php
	$secret = '6LeMDRAUAAAAALiVFhJ9qLa1_MS-xBsap622e4ru';
	$response = $_POST['g-recaptcha-response'];
	$userip = $_SERVER['REMOTE_ADDR'];
	$to = "5035802854@mymetropcs.com";
	$sub = "!Service Request!";
if (isset($_POST['submit'])){
	$url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$userip");
	$result = json_decode($url, TRUE);
	if ($result["success"] == 1){	
		$message =  'prblm:  ' . $_POST['problem'] . '. client:  ' . $_POST['name'] . ' # ' . $_POST['tel'];
		$sms = @mail( $to, $sub, $message );
	}	
}
?>
<!doctype html>
<html>
<head>
	<title> Contact Garibay Tech</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link rel="stylesheet" type="text/css" href="assets/styles/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php include 'assets/imports/header.php'?>
	<center>
	<p>Before I can troubleshoot your problems away, I need you to fill these forms out.</p>
	<form action="" method="post">
		Your Name *:<br>
		<input type="text" name="name" placeholder="John Doe" required><br>
		Email Address *:<br>
		<input type="email" name="email" placeholder="john@doe.com" required><br>
		Phone Number *:<br>
		<input type="tel" name="tel" placeholder="(503)555-5555" required><br>
		Problem *:<br>
		<select name="problem" required>
			<option>Please select one...</option>
			<option value="virus">Virus or Malware</option>
			<option value="install">Help with a program install/uninstall</option>
			<option value="speed">Help speed up your computer</option>
			<option value="clean">Service a full cleaning</option>
			<option value="misc">Other Android, PC or Mac issue</option>
		</select><br>
		Please give me a description of the problem or service you need:<br>
		<textarea name="desc" cols="30" rows="8" wrap="soft"></textarea>
		
		<br>&nbsp;<br>
		<div class="g-recaptcha" data-sitekey="6LeMDRAUAAAAAHRBhwnfoq_dvKNeSXECPs8-5Afi"></div>
		<br>
		<input type="submit" name="submit" value="submit">
	</form>
	</center>
</body>
</html>