<?php
/**
 * Class Elus
 * Gestion des menus dynamiques
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2015-12-17
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Elus {
	
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
	public function getElus() 
	{
		$elus = array();
        $res = $this->_db->query("SELECT * FROM elus");
        while($rang = $res->fetch_array())
        {
            $elus[] = $rang;
        }
		
		return $elus;
	}
    
    
    /**
	 * getMenu 
     * @access public
	 * @return Array
	 */
	public function getElu($id) 
	{
		$elu = array();
        $res = $this->_db->query("SELECT * FROM elus WHERE id = ".$id);
        if($rang = $res->fetch_array())
        {
            $elu = $rang;
        }
		return $elu;
	}
    
    /**
	 * getMenu 
     * @access public
	 * @return Array
	 */
	public function rechercheElusArrond($arrond = '') 
	{
		
        $elus = array();
        if(!is_string($arrond))
        {
            throw new Exception ("Le paramètre est invalide");    
        }
        else if(is_numeric($arrond))
        {
            throw new Exception ("Le paramètre ne doit pas contenir de chiffre");   
        }
        
        $arrond =$this->_db->escape_string ( $arrond );
        
        
        if($arrond != '')
        {
            $res = $this->_db->query("SELECT * FROM elus WHERE Arrondissement LIKE '%". $arrond ."%'");
            while($rang = $res->fetch_array())
            {
                $elus[] = $rang;
            }
        }
		return $elus;
	}
    
    
    
}




?>