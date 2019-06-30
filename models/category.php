<?php
/**
 * The Category Model does the back-end heavy lifting for the Category Controller
 */
class Category_Model
{
	/**
	 * Holds instance of database connection
	 */
	private $db;
		
	public function __construct()
	{
		$this->db = new MysqlImproved_Driver;
	}
	
	/**
	 * Fetches article based on supplied name
	 * 
	 * @param string $author
	 * 
	 * @return array $article
	 */
	public function get_category($link)
	{	
	//echo "<br />inside Model->Category: ".$link;	//TEST CODE

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
				1
			;
			"
		);

		//execute query
		$this->db->query();
		
		$article = $this->db->fetch('all');

		//echo "<br/><br/>Post article array: ".$article; //TEST CODE
		//var_dump($article); //TEST CODE
		return $article;
	}
	
	/**
	 * Fetches article based on supplied name
	 * 
	 * @param string $author
	 * 
	 * @return array $article
	 */
	public function get_archive()
	{	
	//echo "<br />inside Model->Category: ".$author;	//TEST CODE

		//connect to database
		$this->db->connect();
		
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
				1
			;
			"
		);

		//execute query
		$this->db->query();
		
		//$article = $this->db->fetch('array');
		$article = $this->db->fetch('all');

		//echo "<br/><br/>Archive article array: ";//.$article; //TEST CODE
		//var_dump($article); //TEST CODE
		return $article;
	}
	
}
