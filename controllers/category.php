<?php
/**
 * This Controller handles the retrieval and serving of news articles
 */
class Category_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'category';
	
	/**
	 * This is the default function that will be called by router.php
	 * 
	 * @param array $getVars the GET variables posted to index.php
	 */
	public function main(array $getVars)
	{
	//echo "<br />inside News Controller: &nbsp;"; //TEST CODE
	//var_dump($getVars); //TEST CODE
		$categoryModel = new Category_Model;
		
		//get an article
		//echo "<br />Author: ".$getVars['author']; //TEST CODE
		
		 if (isset($getVars['link']))  //if category link given by URL
          {  
               //echo "isset".$getVars['link']; //TEST CODE
			   
			   // no special post is requested, we'll show a list of all available posts 
               $article = $categoryModel->get_category($getVars['link']);
			   
			  //create a new view and pass it our template
			  //$view = new View_Model($this->template);			 
			  $view = new View_Model('category');			   
          } 
          else //show all categories
          { 
			   //echo "NOTset"; //TEST CODE
			
               // show the requested post
               $article = $categoryModel->get_archive();
			   
			  //create a new view and pass it our template
			  $view = new View_Model('categorylist');
          }  
		
		//TEST CODE
		//echo "<br/><br/>Back in Controller: ";
		//var_dump($article);
		//assign article data to view
		$view->assign('article' , $article); //FAILS
	}
}
