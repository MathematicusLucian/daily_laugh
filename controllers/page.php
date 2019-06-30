<?php
/**
 * This Controller handles the retrieval and serving of news articles
 */
class Page_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'page';
	
	/**
	 * This is the default function that will be called by router.php
	 * 
	 * @param array $getVars the GET variables posted to index.php
	 */
	public function main(array $getVars)
	{
	//echo "<br />inside Page Controller: &nbsp;"; //TEST CODE
	//var_dump($getVars); //TEST CODE
		$pageModel = new Page_Model;
		
		//get an article
		//echo "<br />Author: ".$getVars['author']; //TEST CODE
		
		 if (isset($getVars['link']))  //if post link given by URL
          {  
               //echo "isset".$getVars['link']; //TEST CODE
			   
			   // no special post is requested, we'll show a list of all available posts 
               $article = $pageModel->get_post($getVars['link']);
			   
			  //create a new view and pass it our template
			  //$view = new View_Model($this->template);			 
			  $view = new View_Model('page');			   
          } 
		
		//TEST CODE
		//echo "<br/><br/>Back in Controller: ";
		//var_dump($article);
		//assign article data to view
		$view->assign('article' , $article); //FAILS
	}
}
