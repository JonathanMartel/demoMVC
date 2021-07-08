<?php
/**
 * Fichier de configuration. Il est appelé par index.php et par test/index.php
 * Il contient notamment l'autoloader
 * @author Jonathan Martel
 * @version 1.2
 * @update 2013-03-11
 * @update 2014-09-23 Modification de la fonction autoload, utilisation des path + appel à la fonction native.
 * @update 2015-12-18 Ajout de la configuration automatique de la connection MySQL en fonction du HTTP_HOST
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
	define('MODELE_DIR', 'modeles/');	// Chemin vers les modèles
	define('VUES_DIR', 'vues/');	// Chemin vers les vues
	define('LIB_DIR', 'lib/');	// Chemin vers les librairies
	// Allo les ami(e)s
    if(strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false || strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) // debug local (trouver la sous-chaine 127.0.0.1)
    {
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DB', 'demomvc');
    }
    else if(strpos($_SERVER['HTTP_HOST'], 'webdev.cmaisonneuve.qc.ca') !== false) // serveur prod
    {
        define('HOST', '');
        define('USER', '');
        define('PASS', '');
        define('DB', 'demomvc');
    }
	
	function my_autoloader($class) 
	{
		$dossierClasse = array('modeles/', 'vues/', 'lib/mySQL/', 'lib/', '' );
		
		foreach ($dossierClasse as $dossier) 
		{
			//var_dump('./'.$dossier.$class.'.class.php');
			if(file_exists('./'.$dossier.$class.'.class.php'))
			{
				require_once('./'.$dossier.$class.'.class.php');
			}
		}
		
	  
	}
	
	spl_autoload_register('my_autoloader');
	
?>
