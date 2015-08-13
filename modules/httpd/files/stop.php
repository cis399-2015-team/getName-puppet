<?php 

include("../login.php");

$loc = 'https://ec2-52-10-36-255.us-west-2.compute.amazonaws.com/stop.php';

?>

<html>
<head>
<title>Stop EC2 Instance</title>
<head>


<body>
<h1>Stop Instance <?php echo $_SESSION['instance']; ?></h1>

<?php
	if(!$_POST['gonow']) {
		echo "<form id='stop' action=$loc method='post'>" . 
		"<fieldset ><legend>Enter Credentials</legend>" .
		"<label for='key' >KEY*:</label>" .
		"<input type='text' name='key' id='key' />" .
		"<label for='secret' >SECRET*:</label>" .
		"<input type='text' name='secret' id='secret' />" .
		"<input type='submit' name='gonow' value='EXECUTE' />" .
		"</fieldset></form>";
	}
	if($_POST['gonow']) {
		$result = StopInstance($_SESSION['instance'], trim($_POST['key']), trim($_POST['secret']);
		echo $result;
	}
?>

</body>
</html>