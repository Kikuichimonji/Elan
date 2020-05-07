<?php
    function welcome_check($auth,$link)
    {   
        try{
            $sql= "SELECT * FROM client WHERE auth = '$auth'";
            $stmt = $link->query($sql);      //Excecution de la requete
            $reponse = $stmt->fetch();      // Parcour de la table 
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }    
        return $reponse;
    }

    function welcome_fill_client($mail,$link)
    {  
        try{
            $sql= "SELECT * FROM client WHERE email = '$mail'";
            $stmt = $link->query($sql);      
            $reponse = $stmt->fetch();   
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            die();
        } 
        return $reponse;
    }
    function welcome_fill_account($mail,$link)
    {
        try{
            $sql= " SELECT b.libelee_compte,b.solde
            FROM bank_account b 
            INNER JOIN client c ON b.id_client = c.id
            WHERE c.email = '$mail'";
            $stmt = $link->query($sql);      
            $reponse = $stmt->fetchAll();  
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            die();
        } 
        return $reponse;
    }
   