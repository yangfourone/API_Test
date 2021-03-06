<?php
//require_once(''); //require handler
require_once('UserHandler.php');
require_once('EnvHandler.php');
require_once('ActivityHandler.php');
require_once('DailyHandler.php');
require_once('TaskHandler.php');

$method = $_SERVER['REQUEST_METHOD'];
$params = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$controller = $params[0];
$input = json_decode(file_get_contents('php://input'),true);
$queryStr = $_SERVER['QUERY_STRING'];

 switch ($controller){
	 // route[/api/user]
	 case 'user':
		//to-do handler
	 	$userHandler = new UserHandler($method,$params,$input);
	 	echo $userHandler->response();
		break;
	// route[/api/task]
	case 'env':
	 	//to-do handler
		$envHandler = new EnvHandler($method,$params,$input);
	 	echo $envHandler->response();
		break;
	case 'activity':
		//to-do handler
		$activityHandler = new ActivityHandler($method,$params,$input);
	 	echo $activityHandler->response();
		break;
	case 'daily':
		//to-do handler
		$dailyHandler = new DailyHandler($method,$params,$input);
	 	echo $dailyHandler->response();
		break;
	case 'task':
		$taskHandler = new TaskHandler($method,$params,$input);
		echo $taskHandler->response();
		break;
 }

 //echo '</br>';
 //echo 'method '.$method.'</br>';
 //echo 'action '.$action[0].'</br>';
 //echo 'input: '.($input['name']).'</br>';
?>