<?php
/**
 * This Controller handles the retrieval and serving of news articles
 */
class Home_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'home';
	
	/**
	 * This is the default function that will be called by router.php
	 * 
	 * @param array $getVars the GET variables posted to index.php
	 */
	public function main(array $getVars)
	{
	//echo "<br />inside News Controller: &nbsp;"; //TEST CODE
	//var_dump($getVars); //TEST CODE
		$homeModel = new Home_Model;
		
		//get an article
		//echo "<br />Author: ".$getVars['author']; //TEST CODE
		
			   //echo "NOTset"; //TEST CODE
			
               // show the requested post
               $article = $homeModel->get_archive();
			   
			  //create a new view and pass it our template
			  $view = new View_Model('home');
		
		//TEST CODE
		//echo "<br/><br/>Back in Controller: ";
		//var_dump($article);
		//assign article data to view
		$view->assign('article' , $article); //FAILS
	}
}
