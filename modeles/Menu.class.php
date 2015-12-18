<?php
/**
 * Class Menu
 * Gestion des menus dynamiques
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2015-12-17
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Menu {
	
	private $_db;
    
	function __construct ()
	{
		$dbsingleton = monSQL::getInstance();
        $this->_db = $dbsingleton->getConnection();
	}
	
	function __destruct ()
	{
		
	}
	
    /**
	 * getMenu 
     * @access public
	 * @return Array
	 */
	public function getMenu() 
	{
		$menu = array();
        $res = $this->_db->query("SELECT `id`, `item`, `lien` FROM menu WHERE statut != 0 ORDER BY ordre ASC");
        while($rang = $res->fetch_array())
        {
            $menu[] = $rang;
        }
		
		return $menu;
	}
    
    
    
}




?>