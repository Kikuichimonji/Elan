<?php
    namespace App;

    abstract class AbstractEntity
    {
        
        protected static function hydrate($data, $object){ //$data = données de la base, $object = objet a hydrater
            foreach($data as $field => $value){ // cheque clef est un champ 
                $method = "set".ucfirst($field); //on essaye d'appeler un setter pour chaque données
                if(method_exists($object, $method)){ // Si la methode existe, on remplit l'objet
                    $object->$method($value);
                }
            }

        }
    }