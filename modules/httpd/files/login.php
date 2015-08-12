<?php

require("vendor/autoload.php");


$client = Ec2Client::factory(array(
	'key'		=> 'AKIAJWGYRUM6WG7AZ2QQ',
	'secret'	=> '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',
	'region'	=> 'us-west-2'
));

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
                return true;
        } else return false;
}

/* function to stop a specific instance */
function StopInstance($instance_id) {
	$response = $client->stopInstances(array(
		'InstanceIds' => array($instance_id)
	));
	if(!$response->isOK()) {
		return false;
	} else return true;
}

function StartInstance($instance_id) {
	$response = $client->startInstances(array(
		'InstanceIds' => array($instance_id)
	));
	if(!$response->isOK()) {
		return false;
	} else return true;
}

function RestartInstance($instance_id) {
	if(!StopInstance($instance_id)) {
		return false;
	}
	if(!StartInstance($instance_id)) {
		return false;
	}
	return true;
}

?>
