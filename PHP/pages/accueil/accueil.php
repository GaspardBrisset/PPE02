<?php
    include_once("include/header.php");
?>  
    <link rel="stylesheet" type="text/css" href="pages/accueil/CSS/Accueil.css" media="all"/>
<?php
    echo  "Informations : Tacosland, 22 place de la Victoire, 63000 CLERMONT-FERRAND";
    echo "Informations : Tacosland, 22 place de la Victoire, 63000 CLERMONT-FERRAND";
    echo "Horaires : Ouvert de 11h00 à 23h";
    
    
?>
    <form action="<?php echo ControllerAccueil::redirectTacos();?>">
        <input type="submit" value="Commander" />
    </form>