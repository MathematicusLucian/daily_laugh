<?php
/**
 * This Controller handles the retrieval and serving of news articles
 */
class Gallery_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'gallery';
	
	/**
	 * This is the default function that will be called by router.php
	 * 
	 * @param array $getVars the GET variables posted to index.php
	 */
	public function main(array $getVars)
	{
	//echo "<br />inside News Controller: &nbsp;"; //TEST CODE
	//var_dump($getVars); //TEST CODE
		$galleryModel = new Gallery_Model;
		
		//get an article
		//echo "<br />Author: ".$getVars['author']; //TEST CODE
		
		 if (isset($getVars['link']))  //if post link given by URL
          {  
               //echo "isset".$getVars['link']; //TEST CODE
			   
			   // no special post is requested, we'll show a list of all available posts 
               $article = $galleryModel->get_post($getVars['link']);
			   
			  //create a new view and pass it our template
			  //$view = new View_Model($this->template);			 
			  $view = new View_Model('gallerypost');			   
          } 
          else 
          { 
			   //echo "NOTset"; //TEST CODE
			
               // show the requested post
               $article = $galleryModel->get_archive();
			   
			  //create a new view and pass it our template
			  $view = new View_Model('galleryall');
          }  
		
		//TEST CODE
		//echo "<br/><br/>Back in Controller: ";
		//var_dump($article);
		//assign article data to view
		$view->assign('article' , $article); //FAILS
	}
}
