<!DOCTYPE html>
<html>

	<head>

		<title>Test unitaire</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="../css/global.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="header">
			<h1>Test - Menu</h1>
		</div>
		<div id="contenu">
			<?php 
                include ("../modeles/Menu.class.php");
                include ("../modeles/Elus.class.php");
                include ("../lib/monSQL.class.php");
            

                $oMenu = new Menu();
                echo "<h2>Menu::getMenu()</h2>";
                var_dump($oMenu->getMenu());
            

                $oElus = new Elus();
                echo "<details>";
                echo "<summary>Elus::getElus()</summary>";
                var_dump($oElus->getElus());
                echo "</details>";
                
                echo "<details>";
                $res = $oElus->rechercheElusArrond("Anjou");
                echo '<summary>Elus::rechercheElusArrond($arrond = "Anjou") Attendu 5, résultat = '. count($res) .'</summary>';
                var_dump($res);
                echo "</details>";
                
                echo "<details>";
                echo '<summary>Elus::rechercheElusArrond($arrond = "")</summary>';
                var_dump($oElus->rechercheElusArrond(""));
                echo "</details>";
                
                echo "<details>";
                echo '<summary>Elus::rechercheElusArrond($arrond = "Totolemagicien")</summary>';
                var_dump($oElus->rechercheElusArrond("Totolemagicien"));
                echo "</details>";

            ?>
		</div>
		<div id="footer">

		</div>
	</body>
</html>








