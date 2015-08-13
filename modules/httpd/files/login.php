<?php

$region = 'us-west-2';

/* need to have the AWS EC2 SDK for PHP */
require_once("vendor/autoload.php");

use Aws\Ec2\Ec2Client;

/* function to check login status */
function CheckLogin() {
        if(empty($_POST['username'])) {
                return false;
        }
        if(empty($_POST['password'])) {
                return false;
        }
        if('4cccfd4d1cd762395dbdc23b10b0d09e'==md5(trim($_POST['username'])) &&
        	'a89f8564972803c518c52c273f78ad27'==md5(trim($_POST['password']))) {
                //if credentials match
                return true;
        } else return false;
}

/* function to stop a specific instance */
function StopInstance($id, $key, $secret) {
	$client = Ec2Client::factory(array(
		'credentials' => ['key' => "$key",
					   'secret' => "$secret",],
		'region' => "$region",
		'version' => 'latest',
	));
	$response = $client->stopInstances(array(
		'InstanceIds' => array($id,),
		'DryRun' => false,
	));
}

/* function to start a specific instance */
function StartInstance($id, $key, $secret) {
	$client = Ec2Client::factory(array(
		'credentials' => ['key' => "$key",
					   'secret' => "$secret",],
		'region' => "$region",
		'version' => 'latest',
	));
	$response = $client->startInstances(array(
		'InstanceIds' => array($id,),
		'DryRun' => false,
	));
}

/* function to restart a specific instance */
function RestartInstance($id, $key, $secret) {
	//stop instance
	$result_stop = StopInstance($id, $key, $secret);

	//start instance
	$result_start = StartInstance($id, $key, $secret);
}

?>
