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
	<title>Moni&#39;s Tutoring Group</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link rel="stylesheet" type="text/css" href="assets/styles/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php include 'assets/imports/header.php'?>
	<center>
        <h1>Welcome</h1>
	<p>Swagger</p>
	
	</center>
</body>
</html>