<?php
    include_once("/DTO/Boisson.php");
    
    $tabBoissons = ControllerChoixBoisson::getBoissons();
    
    foreach($tabBoissons as $boisson)
    {
        echo $boisson->getNomBoisson();
?>
        <form method="POST" action="index.php?page=choixBoisson">
            <SELECT name="liste-boisson" size="1">
<?php
                for($i=0;$i<=5;$i++)
                {
?>
                    <option> <?php echo $i; ?> 
<?php
                }
?>
            </SELECT>
            <input type="submit" value="Ajouter"/>
        </form>
<?php
    }






