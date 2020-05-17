<?php
    include_once("/DTO/Boisson.php");
    /*
    unset($_SESSION["idBoisson"]);
    unset($_SESSION["quantiteBoisson"]);
    */
     
    $choixBoissonIsSet = false;
    
    if(!isset($_SESSION["idBoisson"]) && !isset($_SESSION["quantiteBoisson"]))
    {
        $tabBoissons = ControllerChoixBoisson::getBoissons();

        foreach($tabBoissons as $boisson)
        {
            echo $boisson->getNomBoisson();
?>
            <form method="POST" action="index.php?page=choixBoisson">
                <SELECT name='<?php echo "liste-boisson-quantite";?>' size="1">
<?php
                    for($i=1;$i<=5;$i++)
                    {
?>
                        <option> <?php echo $i; ?> 
<?php
                    }
?>
                </SELECT>
                <input type="hidden" name="idBoisson" value="<?php echo $boisson->getIdBoisson();?>"/>
                <input
                <input type="submit" value="Ajouter"/>
            </form>
<?php
        }
    }
  

    if(ControllerChoixBoisson::boissonSession()==true)
    {
        ControllerChoixBoisson::redirectPanier();
    }
    
    
    
    
        
    
        
    
    






