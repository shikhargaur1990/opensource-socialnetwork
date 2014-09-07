<?php
/**
 * 	OpenSource-SocialNetwork
 *
 * @package   (Informatikon.com).ossn
 * @author    OSSN Core Team <info@opensource-socialnetwork.com>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://opensource-socialnetwork.com/licence 
 * @link      http://www.opensource-socialnetwork.com/licence
 */
 
$Settings = new OssnInstallation;
$Settings->dbusername($_POST['dbuser']);
$Settings->dbpassword($_POST['dbpwd']);
$Settings->dbhost($_POST['dbhost']);
$Settings->dbname($_POST['dbname']);
$Settings->weburl($_POST['url']);
$Settings->datadir($_POST['datadir']);
$Settings->setStartupSettings(array(
 'owner_email' => $_POST['owner_email'],
 'notification_email' => $_POST['notification_email'],
 'sitename' => $_POST['sitename']
));
if($Settings->INSTALL()){
  $installed = ossn_installation_paths()->url.'?page=account';
  header("Location: {$installed}");
} else {
  ossn_installation_message($Settings->error_mesg, 'fail');	
  $failed = ossn_installation_paths()->url.'?page=settings';
  header("Location: {$failed}");

}
