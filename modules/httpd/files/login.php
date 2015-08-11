<?php

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
		return false;
	}
	if(empty($_POST['password'])) {
		return false;
	}
	$name = trim($_POST['username']);
	$word = trim($_POST['password']);
	if(!CheckLoginDB($name, $word)) {
		return false;
	}
	session_start();
	$_SESSION['user'] = $name;
	return true;
}

/* function to check login status */
function CheckLogin() {
	
}

/* function to check login credentials against DB */
function CheckLoginDB($name, $word) {
	if(!$db_selected) { 
		/* Return false if DB connection fails */
		return false; 
	}
	
	/* if connection if fine, query for the requested user */
	$qry = "SELECT username, password FROM user ".
		   "WHERE username='$name' AND password='$word' ";
	$result = mysql_query($qry, $link);
	
	/* test user's authorization against DB */
	if(!$result || mysql_num_rows($result) <= 0) {
		/* return false if verification fails */
		return false;
	}
	
	/* user is verified if they exist in DB */
	return true;
}

?>
