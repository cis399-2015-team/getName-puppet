<?php 

include("../login.php");

$location = 'https://ec2-52-10-36-255.us-west-2.compute.amazonaws.com/';
$loc1 = $location . "stop.php";
//$loc2 = $location . "start.php";
//$loc3 = $location . "restart.php";

/* route to a secure HTTPS connection, if not already */
if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    header("Location: $location");
    exit();
}

session_start();

/* route to execution page if command is sent */
if($_POST['stop']) {
	$_SESSION['instance'] = $_POST['instance'];
	$_SESSION['submitted'] = $_POST['submitted'];
	header("Location: $loc1");
	exit();
}
/*
if($_POST['start']) {
	$_SESSION['instance'] = $_POST['instance'];
	header("Location: $loc2");
	exit();
}
if($_POST['restart']) {
	$_SESSION['instance'] = $_POST['instance'];
	header("Location: $loc3");
	exit();
}
*/

?>

<html>
<head>
<title>Team getName EC2/AWS Management Console</title>
</head>

<body>
<h1>Team getName</h1>

<?php
	if(!CheckLogin()) {
		echo "<form id='login' " .
		"action=$location method='post'><fieldset ><legend>Login</legend>" .
		"<input type='hidden' name='submitted' id='submitted' value='1'/>" .
		"<label for='username' >UserName*:</label>" .
		"<input type='text' name='username' id='username'  maxlength='50' />" .
		"<label for='password' >Password*:</label>" .
		"<input type='password' name='password' id='password' maxlength='50' />" .
		"<input type='submit' name='Submit' value='Submit' />" .
		"</fieldset></form>";
	}

	if(CheckLogin() && $_POST['submitted']) {
		echo "<form name='select_instance' action=$location " . 
		"method='POST'><fieldset><legend>AWS EC2 getName CONSOLE</legend>" .
		"<select name='instance' size=1>" .
		"<option value='i-ac00ae64'>i-ac00ae64</option>" .
		/*"<option value='i-fb518833'>i-fb518833</option>" .*/
		"<option value='i-ff820337'>i-ff820337</option>" .
		"</select>" .
		"<button type='submit' name='stop' value='stop instance'>STOP</button>" .
		/*"<button type='submit' name='start' value='start instance'>START</button>" .
		"<button type='submit' name='restart' value='restart instance'>RESTART</button>" .*/
		"</fieldset></form>";
	}

	if(!CheckLogin() && $_POST['submitted']) {
		echo "<img src='deny.jpg' alt='Access Denied' >";
	}
?>
</body>
</html>


