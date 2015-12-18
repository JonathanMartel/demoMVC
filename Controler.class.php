<?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-12-10
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

class Controler 
{
	
		/**
		 * Traite la requête
		 * @return void
		 */
		public function gerer()
		{
			
			switch ($_GET['requete']) {
				case 'accueil':
					$this->accueil();
					break;
                case 'maires':
                    if($_GET['id'] != '')
                    {
                        $this->unMaire();    
                    }
                    else
                    {
                        
					   $this->maires();
                    }
					break;
                case 'recherchearrond':
					$this->rechercheArrond();
					break;
				default:
					$this->accueil();
					break;
			}
		}
    
		private function accueil()
		{
			$oMenu = new Menu();
            $aMenu = $oMenu->getMenu();
            
            
            
            $oVue = new Vue();
            $oVue->AfficheEntete("Accueil", Array("Elus", "Toto le magicien", "Tadam"));
            $oVue->AfficheMenu($aMenu);
            $oVue->AfficheAccueil();
            $oVue->AffichePied();
		}
    
    
        
        private function maires()
		{
			$oMenu = new Menu();
            $aMenu = $oMenu->getMenu();
            
            $oElus = new Elus();
            $aElus = $oElus->getElus();
            
            $oVue = new Vue();
            $oVue->AfficheEntete("Maires", Array("Elus", "Toto le magicien", "Tadam"));
            $oVue->AfficheMenu($aMenu);
            
            $oVue->AfficheElus($aElus);
            $oVue->AffichePied();
		}
    
    
        private function unMaire()
		{
			$oMenu = new Menu();
            $aMenu = $oMenu->getMenu();
            
            $oElus = new Elus();
            $aElu = $oElus->getElu($_GET['id']);
            
            $oVue = new Vue();
            $oVue->AfficheEntete("Maires", Array("Elus", "Toto le magicien", "Tadam"));
            $oVue->AfficheMenu($aMenu);
            
            $oVue->AfficheUnElu($aElu);
            $oVue->AffichePied();
		}
    
        private function rechercheArrond()
		{
			
            $erreur = '';
            $aElus = Array();
            $oMenu = new Menu();
            $aMenu = $oMenu->getMenu();
            
            $oVue = new Vue();
            $oVue->AfficheEntete("Maires", Array("Elus", "Toto le magicien", "Tadam"));
            $oVue->AfficheMenu($aMenu);
           
           
            if($_GET['action'] == 'rechercher')
            {
                $oElus = new Elus();
                try
                {
                     
                    $aElus = $oElus->rechercheElusArrond($_POST['arrond']);
                }
                catch (Exception $e)
                {
                    $erreur = $e->getMessage();     
                }
                $oVue->AfficheChampRechercheArrond($_POST['arrond'], $erreur); 
                $oVue->AfficheElus($aElus);
            }
            else
            {
                $oVue->AfficheChampRechercheArrond($_POST['arrond'], $erreur); 
            }
              
            
           
            $oVue->AffichePied();
		}
		// Placer les méthodes du controleur.
		
		
}
?>















