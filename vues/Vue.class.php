<?php
/**
 * Class Vue
 * Template de classe Vue. Dupliquer et modifier pour votre usage.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-12-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

//J'ajoute du texte ici!!!!!!!!!!!

class Vue {

	/**
	 * Affiche la page d'accueil 
	 * @access public
	 * 
	 */
	public function AfficheEntete($titre = '', $motcles = Array()) {
		?>
		<!DOCTYPE html>
            <html lang="fr">
                <head>
                    <title>Mon simple MVC - <?php echo $titre ?></title>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                    <meta name="keywords" content="<?php echo implode(',',$motcles)?>">
                    <meta name="viewport" content="width=device-width">

                    <link rel="stylesheet" href="./css/normalize.css" type="text/css" media="screen">
                    <link rel="stylesheet" href="./css/base_h5bp.css" type="text/css" media="screen">
                    <link rel="stylesheet" href="./css/main.css" type="text/css" media="screen">

                    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
                    <script src="./js/plugins.js"></script>
                    <script src="./js/main.js"></script>
                </head>
                <body>
    <?php
    }
    
    public function AfficheMenu($aMenu = array())
    {
        if(!empty($aMenu))
        {
            echo "<nav><ul>";
            foreach($aMenu as $item)
            {
                ?>
                    
                        <li>
                            <a href="<?php echo $item['lien'] ?>"><?php echo $item['item'] ?></a>
                        </li>
                
                <?php 
            }
            echo "</ul></nav>";
        }
		echo "<main>";
    }
    
    public function AfficheAccueil ()
    {
        ?>
        
            <article>
                <h1>Bienvenue sur Simple MVC Structure </h1>
                <p>Simple MVC Structure  n'est pas un framework, mais seulement une structure de base qui permet de monter un MVC rapidement en php. 
                    Il suffit de forker le <a href="#">dépot Github</a> et de dupliquer les classes vues et modele afin d'en disposer à votre convenance.</p>
            </article>

        
    <?php
    }
    
    
    public function AfficheElus ($aElus = Array())
    {
        
            foreach($aElus as $elu)
            {
                if(!empty($elu['Nom']))
                {
            ?>
                <article class="elus">
                    <h2><a href="index.php?requete=maires&id=<?php echo $elu['id']?>"><?php echo $elu['Nom'] . ", " . $elu['Prénom'] ?></a></h2>
                </article>
            <?php
                }
            }
                
    }
    
     public function AfficheUnElu ($aElu = Array())
    {
        ?>
           
                <article class="elu">
                    <h2><?php echo $aElu['Nom'] . ", " . $aElu['Prénom'] ?></h2>
                    <p><?php echo $aElu['Fonction'] ?></p>
                </article>
            
    <?php
    }
    
    public function AfficheChampRechercheArrond ($recherche = '', $erreur ='')
    {
        ?>
            
                <form action="index.php?requete=recherchearrond&action=rechercher" method="post">
                    Arrondissement : <input type="text" name="arrond" value="<?php echo $recherche ?>"> <span class="erreur"><?php echo $erreur ?></span>
                    <br><input type="submit" value="Soumettre (HTTP)"></form> 
                <button class="btnSoumettre">Soumettre (Ajax)</button>
                <h3>Résultat Ajax : </h3><article class="resultat"></article>
           
    <?php
    }
    
    public function AffichePied()
    {
            ?>
         	</main>
			<div id="footer">
				Certains droits réservés @ Jonathan Martel (2015)<br>
				Sous licence Creative Commons (BY-NC 3.0)
			</div>
		</div>	
	</body>
</html>

		<?php
		
	}
	

}
?>