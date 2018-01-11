<?php
require "aws.phar";

use Aws\Ec2\Ec2Client;
use Aws\Common\Enum\Region; 

$aws = Ec2Client::factory(array(
'version'=> 'latest',
'region' => 'us-east-1',
'credentials' => array(
'key' => '',
'secret' => ''
)
));

$result = $aws->runInstances(array(
    'ImageId'        => '',
    'MinCount'       => 1,
    'MaxCount'       => 1,
    'InstanceType'   => 't2.micro',
    'KeyName'        => '',
    'SecurityGroups' => array(''),
));

header("Location: http://localhost/ec2/dashboard.php");
die();
?>
