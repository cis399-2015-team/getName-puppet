<?php 
/* need to have the AWS EC2 SDK for PHP */
require("vendor/autoload.php");

use Aws\Ec2\Ec2Client;

$loc = 'https://ec2-52-10-36-255.us-west-2.compute.amazonaws.com/stop.php';
$region = 'us-west-2';

session_start();

?>

<html>
<head>
<title>Stop EC2 Instance</title>
</head>


<body>
<h1>Stop Instance <?php echo "$_SESSION['instance']"; ?></h1>

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
		$client = Ec2Client::factory(array(
		'credentials' => ['key' => "$_POST['key']",
					   'secret' => "$_POST['$secret']",],
		'region' => "$region",
		'version' => 'latest',
		));
		$response = $client->stopInstances(array(
			'InstanceIds' => array($_SESSION['instance'],),
			'DryRun' => false,
		));
	}
?>

</body>
</html>