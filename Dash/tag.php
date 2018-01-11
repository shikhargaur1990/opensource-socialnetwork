<?php
print_r($_POST);
$c=$_POST["commname"];
$c=trim($c);
$i=$_POST["id"];
$i=trim($i);

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

$result = $aws->createTags(array(
    'Resources' => array($i),
    'Tags' => array(
        'Tag' => array(
           'Key' => 'Name',
           'Value' => $c
       )
    )
));

header("Location: http://localhost/ec2/dashboard.php");
die();
?>
