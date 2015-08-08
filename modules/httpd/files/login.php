<?php

$user = 'root';
$password = 'getName399';
$db = '';
$host = 'localhost';
$port = 8889;

$link = mysql_connect("$host:$port", $user, $password);
$db_selected = mysql_select_db($db, $link);

$SQLstring = "SELECT *";
$query = mysql_query($SQLstring);

function Login() {

}

function CheckLogin() {

}

function CheckLoginDB() {

}

function RegisterUser() {

}

function SaveToDatabase() {

}

function CreateTable() {

}

function InsertIntoDB() {

}

?>
