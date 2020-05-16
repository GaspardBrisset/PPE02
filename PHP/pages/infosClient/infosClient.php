<?php
    //unset($_SESSION["idClient"]);
    
    if(!isset($_SESSION["idClient"]))
    {    
?>
        <form method="POST" action="index.php?page=infosClient">

            <label>Prénom :</label> 
            <input type="text" name="prenom" required/>
            <label>Nom :</label>
            <input type="text" name="nom" required/>
            <label>Adresse mail :</label>
            <input type="text" name="email" required/>
            <label>Numéro de téléphone :</label>
            <input type="text" name="telephone" required/>
            <label>Adresse :</label>
            <input type="text" name="adresse" required/>
            <input type="submit" value="Valider"/>

        </form>
<?php
    }
    
    if(ControllerInfosClient::clientSession()==true)
    {
        ControllerInfosClient::insertClient();
        ControllerInfosClient::redirectCommandeIsOver();
        
    }
?>

