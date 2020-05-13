<?php
    include_once("/DAO/ViandeManager.php");

    class ControllerChoixViande
    {
            
        public static function includeView()
        {
            include_once("/pages/choixViande/choixViande.php");
        }
        
        public static function getViandes()
        {
            $tabViandes = ViandeManager::findAllViandes();
            return $tabViandes;
        }
        
        public static function redirectSauce()
        {
            header('Location: index.php?page=choixSauce');
            exit;
        }
        
        public static function ViandesSession()
        {
            //prof : mettre en session un tableau avec les 3 viandes
            
            $idViande1 = null;
            $idViande2 = null;
            $idViande3 = null;
            
            unset($_SESSION["idViande1"]);
            unset($_SESSION["idViande2"]);
            unset($_SESSION["idViande3"]);
            
            $viandeSessionIsSet = false;
            
            if(!empty($_POST["button-choix-viande1"])) // ou isset
            {
                $idViande1 = $_POST["button-choix-viande1"];
                $_SESSION["idViande1"] = $idViande1; 
                
                $viandeSessionIsSet = true;
                
                if(!empty($_POST["button-choix-viande2"])) // ou isset
                {
                    $idViande2 = $_POST["button-choix-viande2"];
                    $_SESSION["idViande2"] = $idViande2; 
                    
                    if(!empty($_POST["button-choix-viande3"])) // ou isset
                    {
                        $idViande3 = $_POST["button-choix-viande3"];
                        $_SESSION["idViande3"] = $idViande3; 
                    }
                }
            }
            
            return $viandeSessionIsSet;
        }
    }
    
?>