<?php
    $idTypeTacos = $_POST["button-choix-taille"];
    //$tacos = TypeTacosManager::findTypeTacos();
    $_SESSION["idTypeTacos"]=$idTypeTacos;
    if(!empty($_SESSION["idTypeTacos"]))
    {
?>

        <form method="POST" action="index.php?page=choixSauce">

            <input type="radio" name="button-choix-viande" id="viande1" value="1"/>
            <label for="viande1">Bacon</label>

            <input type="radio" name="button-choix-viande" id="viande2" value="2"/>
            <label for="viande2">Steak</label>
            
            <input type="radio" name="button-choix-viande" id="viande3" value="3"/>
            <label for="viande3">Escalope</label>
            
            <input type="radio" name="button-choix-viande" id="viande4" value="0"/>
            <label for="viande4">Bacon</label>
            
            <input type="submit" value="Valider"/>
        </form>
<?php
    }
?>