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
?>

<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

th{
 background-color: #4CAF50;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<style>
.city {
    background-color: tomato;
    color: white;
    padding: 10px;
}
</style>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

#container{
    text-align: left;
}

input, button{
    margin:0;
}

input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin:auto;
  	display:block;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

label textarea{
 vertical-align: top;
 width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}


div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 10px;
}
</style>
</head>

<body>


<h2 class="city">Community Instances</h2>
<?php
$result = $aws->DescribeInstances();

echo "<table>";
echo "<tr><th>"."COMMUNITY"."</th><th>"."INSTANCE ID"."</th><th>"."STATE"."</th><th>"."START/STOP"."</th><th>"."URL"."</th></tr>";

$reservations = $result['Reservations'];
foreach ($reservations as $reservation) 
{
	$instances = $reservation['Instances'];
	foreach ($instances as $instance) 
	{
		$instanceName = '';
		foreach ($instance['Tags'] as $tag) 
		{
			if ($tag['Key'] == 'Name') 
			{
				$instanceName = $tag['Value'];
			}
		}

		if($instance['State']['Name']=='stopped')
			$temp="Start";
		else
			$temp="Stop";
		$instanceid=$instance['InstanceId'];
		if($temp=="Start")
			{
				echo "<form action=\"start.php\" method= \"post\">";
				//$temp="Start";
			}
		else
			{
				echo "<form action=\"stop.php\" method= \"post\">";
				//$temp="Stop";
			}

		echo "<input type='hidden' name=\"id\" value= $instanceid>";
		$butn="<input type=\"submit\" value= \"$temp\" >";

		echo "<tr><td>".$instanceName."</td><td>".
			 $instance['InstanceId']."</td><td>".
			 $instance['State']['Name']."</td><td>".
			 $butn."</td><td>".
			 $instance['PublicDnsName']."</td></tr>";
		echo "</form>";
		}
 }
echo "</table>";
?>

<h2 class="city">Create/Delete Communities</h2>
<form action="create.php" method= "post">
<div id="container">
<input type="submit" value= "Create New">
</form>

<form action="tag.php" method= "post">
<label for="n">Community Name</label>
<input type="text" name="commname" placeholder="community name....">
<label for="n">Instance ID</label>
<input type="text" name="id" placeholder="instance id...."><input type="submit" value= "Tag Name" >
</form>
<form action="delete.php" method= "post">
<label for="n">Community Name</label>
<input type="text" name="coname" placeholder="instance id....">
<input type="submit" value= "Delete" >
</form>
</div>



<h2 class="city">Database Instance</h2>
<div id="container">
<?php


use Aws\Rds\RdsClient;

$db = RdsClient::factory(array(
	'version'=> 'latest',
    'region'  => 'us-east-1',
    'credentials' => array(
	'key' => '',
	'secret' => ''
)
));

$dbresult = $db->describeDBInstances();
$dbreservations = $dbresult['DBInstances'];
foreach ($dbreservations as $dbreservation) 
{
	//$instances = $reservation['Instances'];
	//foreach ($instances as $instance) 
	{
		echo "<h3><font size=\"7\">".'DB name: '.$dbreservation['DBInstanceIdentifier'].PHP_EOL;
		echo '<br>';
		echo 'DB Instance Status: '.$dbreservation['DBInstanceStatus'].PHP_EOL;
		echo '<br>';
		echo 'Engine: '.$dbreservation['Engine'].PHP_EOL;
		echo '<br>'."</h3></font>";

	}
}
?>
</div>
</body>
</html>
