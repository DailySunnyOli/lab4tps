<?php
namespace process;
require '../header.php';
require_once("../config/autoload.php");

use models\user as user;
use repositories\userRepository as userRepository;

$repo = new userRepository();
$users = $repo->getAll();
$user = new user();

$loggedUser = NULL;
if($_POST){
	
	foreach ($users as $key => $value) {
		if($_POST['user'] == $value->getUser()){
			if($_POST['pass'] == $value->getPass()){
                $loggedUser = $value;
                var_dump($loggedUser);
			}
		}
	}
}
if($loggedUser != NULL){
	session_start();
	$_SESSION['loggedUser'] = $loggedUser->getName();
	header("location:../dashboard.php");
	
}else{
	echo "<script> if(confirm('Verifique que los datos ingresados sean correctos'));";
	echo "window.location = '../index.php';
		</script>";
}



?>
