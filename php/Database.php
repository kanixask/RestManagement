<?php
	require 'vendor/autoload.php';
	use Medoo\Medoo;
	
	$database = new Medoo([
		'database_type' => 'mysql',
		'database_name' => 'db_rest_admin',
		'server' => 'localhost',
		'username' => 'root',
		'password' => 'reggaeroots'
	]);
?>