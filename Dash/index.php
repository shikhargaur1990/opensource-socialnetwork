<?php

require "aws.phar";

use Aws\Rds\RdsClient;

$client = RdsClient::factory(array(
	'version'=> 'latest',
    'region'  => 'us-east-1',
    'credentials' => array(
	'key' => '',
	'secret' => ''
)
));

$result = $client->describeDBInstances();
$reservations = $result['DBInstances'];
foreach ($reservations as $reservation) 
{
	//$instances = $reservation['Instances'];
	//foreach ($instances as $instance) 
	{
		echo 'DB name: '.$reservation['DBInstanceIdentifier'].PHP_EOL;
		echo '<br>';
		echo 'DB Instance Status: '.$reservation['DBInstanceStatus'].PHP_EOL;
		echo '<br>';
		echo 'Engine: '.$reservation['Engine'].PHP_EOL;
		echo '<br>';

	}
}
?>
