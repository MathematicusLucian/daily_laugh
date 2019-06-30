<?php
/**
 * The Page Model does the back-end heavy lifting for the Page Controller
 */
class Page_Model
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
	public function get_post($link)
	{	
	//echo "<br />inside Model->News: ".$author;	//TEST CODE

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

		//echo "<br/><br/>Post article array: ".$article; //TEST CODE
		//var_dump($article); //TEST CODE
		return $article;
	}
	
}
