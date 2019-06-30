<?php
/**
 * The Home Model does the back-end heavy lifting for the Home Controller
 */
class Home_Model
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
	public function get_archive()
	{	
	//echo "<br />inside Model->Home: ".$author;	//TEST CODE

		//connect to database
		$this->db->connect();
		
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
			LIMIT
				8
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
