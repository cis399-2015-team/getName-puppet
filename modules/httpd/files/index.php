<?php 

/* require("../login.php"); */

$user = 'root';
$pass = 'getName399';
$db = 'php';
$host = 'localhost';
$port = 2098;
$link = mysql_connect("$host:$port", $user, $pass);
$db_selected = mysql_select_db($db, $link);

/* function that handles logging into site */
function Login() {
	if(empty($_POST['username'])) {
		return false; echo 1;
	}
	if(empty($_POST['password'])) {
		return false; echo 2;
	}
	$n = $_POST['username'];
	$w = $_POST['password'];
	if(!CheckLoginDB($n, $w)) {
		return false; echo 3;
	}
	return true;
}

/* function to check login credentials against DB */
function CheckLoginDB($name, $word) {
	if(!$db_selected) { 
		/* Return false if DB connection fails */
		return false; echo 4;
	}
	/* if connection if fine, query for the requested user */
	$qry = "SELECT username, password FROM user ".
		   "WHERE username='$name' AND password='$word' ";
	$result = mysql_query($qry, $link);
	/* test user's authorization against DB */
	if(!$result || mysql_num_rows($result) <= 0) {
		/* return false if verification fails */
		return false; echo 5;
	}
	/* user is verified if they exist in DB */
	return true;
}

$login_flag = Login();

?>

<html>
<head>
<title>Team getName EC2/AWS Management Console</title>
</head>

<body>
<h1>Team getName</h1>

<?php
	if(!$login_flag) {
		echo "<form id='login' action='index.php' method='post' accept-charset='UTF-8'>" .
		"<fieldset >" .
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

	if($login_flag && $_POST['submitted']) {
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

	if(!$login_flag && $_POST['submitted']) {
		echo "<img src='deny.jpg' alt='Access Denied' >";
	}
?>
</body>
</html>


