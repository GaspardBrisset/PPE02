<?php
    /*session_unset();
    session_destroy();*/

    include_once("/DTO/Viande.php");
    include_once("/DAO/ViandeManager.php");

    //echo $_SESSION["idTypeTacos"];
    $tailleTacos = $_SESSION["idTypeTacos"];
    
    if(!empty($tailleTacos) && !isset($_POST["button-choix-viande1"]))
    {
        $tabViandes=ControllerChoixViande::getViandes();
?>
        <form method="POST" action="index.php?page=choixViande">
<?php
            if($tailleTacos>=1)
            {
                //idTypeTacos=2 => taille=L => 2 viandes => 2 lignes de boutons radio
                echo "Choix viande n°1: "."<br>";
                foreach($tabViandes as $viande)
                {
?>
                    <input type="radio" 
                           name="button-choix-viande1" 
                           id='<?php echo "viande".$viande->getIdViande(); ?>' 
                           value='<?php echo $viande->getIdViande(); ?>'/>

                    <label for='<?php echo "viande".$viande->getIdViande(); ?>'>
                        <?php echo $viande->getNomViande(); ?></label>
<?php
                } 
                echo "<br>";
            }

            if($tailleTacos>=2)
            {
                //idTypeTacos=2 => taille=L => 2 viandes => 2 lignes de boutons radio
                echo "Choix viande n°2: "."<br>";
                foreach($tabViandes as $viande)
                {
?>
                    <input type="radio" 
                           name="button-choix-viande2" 
                           id='<?php echo "viande".$viande->getIdViande(); ?>' 
                           value='<?php echo $viande->getIdViande(); ?>'/>

                    <label for='<?php echo "viande".$viande->getIdViande(); ?>'>
                        <?php echo $viande->getNomViande(); ?></label>
<?php
                } 
                echo "<br>";
            }
            
            if($tailleTacos==3)
            {
                //idTypeTacos=3 => taille=XL => 3 viandes => 3 lignes de boutons radio
                echo "Choix viande n°3: "."<br>";
                foreach($tabViandes as $viande)
                {
?>
                    <input type="radio" 
                           name="button-choix-viande3" 
                           id='<?php echo "viande".$viande->getIdViande(); ?>' 
                           value='<?php echo $viande->getIdViande(); ?>'/>

                    <label for='<?php echo "viande".$viande->getIdViande(); ?>'>
                        <?php echo $viande->getNomViande(); ?></label>
<?php
                } 
                echo "<br>";
            }
            
            
?>
            
            <!--<input type="radio" name="button-choix-viande" id="viande2" value="2"/>
            <label for="viande2">Steak</label> -->
            
            <input type="submit" value="Valider"/>
        </form>
<?php
    }
    
    
    if(ControllerChoixViande::ViandesSession()==true)
    {
        ControllerChoixViande::redirectSauce();
    }
    
    
    
?>