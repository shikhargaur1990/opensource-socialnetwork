<?php
print_r($_POST);
$v=$_POST["id"];
foreach ($_POST as $key => $value)
       {
        	$id=$value;
		}

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

$abc = $aws->stopInstances(array(
      // You must put an instance ID here
      'InstanceIds' => array($id)
    ));
header("Location: http://localhost/ec2/dashboard.php");
die();
?>
