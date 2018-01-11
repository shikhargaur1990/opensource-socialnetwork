<?php
print_r($_POST);
$v=$_POST["coname"];
foreach ($_POST as $key => $value)
       {
        	$id=$value;
		}
echo $value;
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

$result = $aws->terminateInstances(array(
    //'DryRun' => true || false,
    // InstanceIds is required
    'InstanceIds' => array($value),
));

header("Location: http://localhost/ec2/dashboard.php");
die();
?>
