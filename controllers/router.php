<?php
/**
 * This controller routes all incoming requests to the appropriate controller
 */
//Automatically includes files containing classes that are called
function __autoload($className)
{
	//parse out filename where class should be located
	list($filename , $suffix) = split('_' , $className);
	
	//select the folder where class should be located based on suffix
	switch (strtolower($suffix))
	{	
		case 'model':
			
			$folder = '/models/';
			
		break;
		
		case 'library':
		
			$folder = '/libraries/';
			
		break;
		
		case 'driver':
		
			$folder = '/libraries/drivers/';
		
		break;
	}

	//compose file name
	$file = SERVER_ROOT . $folder . strtolower($filename) . '.php';
	
	//fetch file
	if (file_exists($file))
	{
		//echo "File '$filename' containing class '$className' found in '$folder'."; //TEST CODE
		//get file
		include_once($file);		
	}
	else
	{
		//file does not exist!
		die("File '$filename' containing class '$className' not found in '$folder'.");	
	}
}
	
//fetch the passed request
$request = $_SERVER['QUERY_STRING'];

//parse the page request and other GET variables
$parsed = explode('&' , $request);

//the page is the first element
$page = array_shift($parsed);

//the rest of the array are get statements, parse them out.
$getVars = array();
foreach ($parsed as $argument)
{
	//split GET vars along '=' symbol to separate variable, values
	list($variable , $value) = split('=' , $argument);
	$getVars[$variable] = urldecode($value);
}

//compute the path to the file
$target = SERVER_ROOT . '/controllers/' . $page . '.php';

//get target
if (file_exists($target))
{
	include_once($target);
	
	//modify page to fit naming convention
	$class = ucfirst($page) . '_Controller';
	
	//instantiate the appropriate class
	if (class_exists($class))
	{
		$controller = new $class;
	}
	else
	{
		//did we name our class correctly?
		die('class does not exist!');
	}
}
else
{
	//can't find the file in 'controllers'! 
	die('page does not exist!');
}
//var_dump($getVars); //TEST CODE
//once we have the controller instantiated, execute the default function
//pass any GET variables to the main method
$controller->main($getVars);


