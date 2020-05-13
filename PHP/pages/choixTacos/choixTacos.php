<?php
    include_once("/DTO/TypeTacos.php");
    include_once("/DAO/TypeTacosManager.php");

    $tabTypeTacos = ControllerChoixTacos::getTypesTacos();
    
?>
    <table>

        <tr>
            <th>Taille</th>
            <th>Viandes</th>
            <th>Sauces</th>
            <th>Prix</th>
        </tr>
    
<?php

        foreach($tabTypeTacos as $typeTacos)
        {
?>
            <tr>
<?php
            echo "<td>".$typeTacos->getTaille()."</td>";

            if($typeTacos->getTaille()=="M")
            {
                echo "<td> 1 </td>";
                echo "<td> 1 </td>";
            }
            else if($typeTacos->getTaille()=="L")
            {
                echo "<td> 2 </td>";
                echo "<td> 2 </td>";
            }
            else if($typeTacos->getTaille()=="XL")
            {
                echo "<td> 3 </td>";
                echo "<td> 2 </td>";
            }

            echo "<td>".$typeTacos->getPrixTaille()."€ </td>";
?>
            </tr>
<?php
        }
    
?>
    </table>
<?php

    if(!isset($_POST["button-choix-taille"]))
    { 
?>
        <form method="POST" action="index.php?page=choixTacos">
            <input type="radio" name="button-choix-taille" id="taille1" value="1"/>
            <label for="taille1">M</label>
            <input type="radio" name="button-choix-taille" id="taille2" value="2"/>
            <label for="taille2">L</label>
            <input type="radio" name="button-choix-taille" id="taille3" value="3"/>
            <label for="taille3">XL</label>
            <input type="submit" value="Valider"/>
        </form>
<?php
    }
    
    if(ControllerChoixTacos::typeTacosSession()==true)
    {
        ControllerChoixTacos::redirectViande();
    }
?>