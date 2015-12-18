<?php
/**
 * Class monSQL
 * Exemple de singleton
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2014-10-16
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * @see https://gist.github.com/jonashansen229/4534794
 * @see http://www.apprendre-php.com/tutoriels/tutoriel-45-singleton-instance-unique-d-une-classe.html
 * 
 */
class monSQL {
	private $_db;
	private static $_instance = null; //L'instance
	
	/*
	Obtenir l'instance de la classe.
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) 
		{ // Si aucun instance, creer l'instance
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructeur privé
	 * @access private
	 */
	private function __construct() {
		$this->_db = new mysqli(HOST, USER, PASS, DB);
		if ($this->_db->connect_errno) {
		    echo "Failed to connect to MySQL: " . $this->_db->connect_error;
		}
        $this->_db->set_charset ("UTF8");
	}

	// Empêche le clonage de la classe.
	private function __clone() { }

	/**
	 * Obtenir la connection
	 * @access private
	 */
	public function getConnection() 
	{
		return $this->_db;
	}
}
?>