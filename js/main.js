/**
 * @file Script contenant les fonctions de base
 * @author Jonathan Martel (jmartel@gmail.com)
 * @version 0.1
 * @update 2013-12-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */

 // Placer votre JavaScript ici
(function(){

    window.addEventListener('load', function(){
        var xhr;
        var btnSoumettre = document.querySelector(".btnSoumettre");
        
        if(btnSoumettre)
        {
            console.log('clic');
            btnSoumettre.addEventListener('click', function(){
                xhr = new XMLHttpRequest();
                xhr.open("POST", "ajaxControler.php?requete=recherchearrond");
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
                var champ = document.querySelector('[name="arrond"]');
                
                xhr.send("arrond="+ champ.value);	
                xhr.onreadystatechange = function(e){
                    console.log(e);
                    if(e.target.readyState == 4 && e.target.status == 200)
                    {
                        console.log(e.target.responseText);
                        var elementRes = document.querySelector(".resultat");
                        if(elementRes)
                        {
                            elementRes.innerHTML = e.target.responseText;
                        }
                    }
                }
            
            
            });
        }
    
    
    });






})();