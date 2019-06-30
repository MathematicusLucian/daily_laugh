<?php
/**
 * Handles the view functionality of our MVC framework
 */
class View_Model
{
	/**
	 * Holds instance of database connection
	 */
	private $db;
	
	/**
	 * Holds variables assigned to template
	 */
	private $data = array();

	/**
	 * Holds render status of view.
	 */
	private $render = FALSE;

	/**
	 * Accept a template to load
	 */
	public function __construct($template)
	{

		//fetch the passed request
		$request = $_SERVER['QUERY_STRING'];
		//parse the page request and other GET variables
		$parsed = explode('&' , $request);
		//the rest of the array are get statements, parse them out.
		$getVars = array();
		foreach ($parsed as $argument)
		{
		//split GET vars along '=' symbol to separate variable, values
		list($variable , $value) = split('=' , $argument);
		$getVars[$variable] = urldecode($value);
		}
		$this->link=$getVars['link'];
		//echo $this->link;
	
		$this->db = new MysqlImproved_Driver;

		$theme = 'default';
		
		//compose theme
		$this->header_theme = SERVER_ROOT . '/views/themes/' . strtolower($theme) . '/header.php';
		$this->menu_theme = SERVER_ROOT . '/views/themes/' . strtolower($theme) . '/menu.php';
		$this->sidebar_theme = SERVER_ROOT . '/views/themes/' . strtolower($theme) . '/sidebar.php';
		$this->footer_theme = SERVER_ROOT . '/views/themes/' . strtolower($theme) . '/footer.php';
		//compose file name
		$file = SERVER_ROOT . '/views/' . strtolower($template) . '.php';
	
		if (file_exists($file))
		{
			/**
			 * trigger render to include file when this model is destroyed
			 * if we render it now, we wouldn't be able to assign variables
			 * to the view!
			 */
			$this->render = $file;
		}		
	}
	
	//GET THEME DATA
	
	public function get_header()
	{	
		//connect to database
		$this->db->connect();
		
		//sanitize data
		$link = $this->db->escape($link);
		
		//prepare query
		$this->db->prepare
		(
			"
			SELECT
				`date`,
				`title`,
				`content`,
				`author`
			FROM
				`articles`
			WHERE
				`author` = '$link'
			LIMIT
				1
			;
			"
		);

		//execute query
		$this->db->query();
		
		$article = $this->db->fetch('array');

		return $article;
	}
	
	public function get_menu()
	{	
		//connect to database
		$this->db->connect();
		
		//sanitize data
		$link = $this->db->escape($link);
		
		//prepare query
		$this->db->prepare
		(
			"
			SELECT
				`date`,
				`title`,
				`content`,
				`author`
			FROM
				`articles`
			WHERE
				`author` = '$link'
			LIMIT
				1
			;
			"
		);

		//execute query
		$this->db->query();
		
		$article = $this->db->fetch('all');

		return $article;
	}
	
	public function get_sidebar($link)
	{	
		//connect to database
		$this->db->connect();
		
		//echo $link."=link"; //TEST CODE
				
		//sanitize data
		$link = $this->db->escape($link);
		
		//prepare query
		$this->db->prepare
		(
			"
			SELECT
				`link`,
				`title`,
				`content`,
				`img`,
				`id_cat`,
				`likes`,
				`dislikes`
			FROM
				`gallery`
			WHERE
				`link` NOT IN ('$link')
			ORDER BY RAND()
			LIMIT
				5
			;
			"
		);

		//execute query
		$this->db->query();
		
		$article = $this->db->fetch('all');

		return $article;
	}
	
	public function get_footer($link)
	{	
		//connect to database
		$this->db->connect();
		
		//sanitize data
		$link = $this->db->escape($link);
		
		//prepare query
		$this->db->prepare
		(
			"
			SELECT
				`link`,
				`title`,
				`content`,
				`img`,
				`id_cat`,
				`likes`,
				`dislikes`
			FROM
				`gallery`
			WHERE
				`link` NOT IN ('$link')
			ORDER BY RAND()
			LIMIT
				5
			;
			"
		);

		//execute query
		$this->db->query();
		
		$article = $this->db->fetch('all');

		return $article;
	}
	
	/**
	 * Receives assignments from controller and stores in local data array
	 * 
	 * @param $variable
	 * @param $value
	 */
	public function assign($variable , $value)
	{
		//TEST CODE
		//echo "<br/><br/>inside Model->View: ***".$variable."***="; //TEST CODE
		//var_dump($value); //TEST CODE
		$this->data[$variable] = $value;
		
		//echo "<br/><br/>Test tag (from Model->View): <br/>"; //TEST CODE
		//var_dump($this->data[$variable]); //TEST CODE
				
		//echo "<br/><br/>Tag article: ".$this->data['article']['title'];//TEST CODE
	}

	/**
	 * Render the output directly to the page, or optionally, return the
	 * generated output to caller.
	 * 
	 * @param $direct_output Set to any non-TRUE value to have the 
	 * output returned rather than displayed directly.
	 */

	public function __destruct()
	{
		//call theme data functions
		$header_data = $this->get_header();
		$menu_data = $this->get_menu();
		$sidebar_data = $this->get_sidebar($this->link);
		//var_dump($sidebar_data); //TEST CODE
		$footer_data = $this->get_footer($this->link);
			
		//assign theme data to array data
		$this->assign('header', $header_data);
		$this->assign('menu', $menu_data);
		$this->assign('sidebar', $sidebar_data);
		$this->assign('footer', $footer_data);
	
		//var_dump($this->data['sidebar']); //TEST CODE
	
		//parse data variables into local variables, so that they render to the view
		$data = $this->data;
		
		//render view		
		include($this->header_theme);
		include($this->render);
		include($this->sidebar_theme);
		include($this->footer_theme);
	}
}
