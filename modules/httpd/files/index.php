<?php 

include("../login.php");
if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    header("Location: https://ec2-52-10-36-255.us-west-2.compute.amazonaws.com/");
    exit();
}

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
		"action='https://ec2-52-10-36-255.us-west-2.compute.amazonaws.com/' " .
		"method='post'>" . "<fieldset >" .
		"<legend>Login</legend>" .
		"<input type='hidden' name='submitted' id='submitted' value='1'/>" .
		"<label for='username' >UserName*:</label>" .
		"<input type='text' name='username' id='username'  maxlength='50' />" .
		"<label for='password' >Password*:</label>" .
		"<input type='password' name='password' id='password' maxlength='50' />" .
		"<input type='submit' name='Submit' value='Submit' />" .
		"</fieldset>" .
		"</form>";
	}

	if(CheckLogin() && $_POST['submitted']) {
		echo "<form name='select_instance' action='index.php' method='POST'>" .
		"<fieldset>" .
		"<legend>AWS EC2 getName CONSOLE</legend>" .
		"<select name='instance' size=1>" .
		"<option value='http://www.link1.com'>i-ac00ae64</option>" .
		"<option value='Http://www.link2.com'>i-fb518833</option>" .
		"<option value='http://www.link3.com'>i-ff820337</option>" .
		"</select>" .
		"<button type='button'>STOP</button>" .
		"<button type='button'>START</button>" .
		"<button type='button'>RESTART</button>" .
		"</fieldset>" .
		"</form>";
	}

	if(!CheckLogin() && $_POST['submitted']) {
		echo "<img src='deny.jpg' alt='Access Denied' >";
	}
?>
</body>
</html>


