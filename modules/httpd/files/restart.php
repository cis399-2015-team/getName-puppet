<?php 

include("../login.php");

$loc = 'https://ec2-52-10-36-255.us-west-2.compute.amazonaws.com/restart.php';

session_start();

?>

<html>
<head>
<title>Restart EC2 Instance</title>
</head>


<body>
<h1>Restart Instance <?php echo $_SESSION['instance']; ?></h1>

<?php
	if(!$_POST['gonow']) {
		echo "<form id='restart' action=$loc method='post'>" . 
		"<fieldset ><legend>Enter Credentials</legend>" .
		"<label for='key' >KEY*:</label>" .
		"<input type='text' name='key' id='key' />" .
		"<label for='secret' >SECRET*:</label>" .
		"<input type='text' name='secret' id='secret' />" .
		"<input type='submit' name='gonow' value='EXECUTE' />" .
		"</fieldset></form>";
	}
?>

</body>
</html>