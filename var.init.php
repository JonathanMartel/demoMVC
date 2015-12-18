<?php
  /**
   * Faire l'assignation des variables ici avec les isset() ou !empty()
   */
   
   
	if(empty($_GET['requete']))
	{
		$_GET['requete'] = '';
	}

    if(empty($_GET['id']))
	{
		$_GET['id'] = '';
	}  

    if(empty($_GET['action']))
	{
		$_GET['action'] = '';
	}
    
	if(empty($_POST['arrond']))
	{
		$_POST['arrond'] = '';
	}
	
   
   
?>