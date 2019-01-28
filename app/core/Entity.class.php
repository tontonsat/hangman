<?php

namespace App\Core;

abstract class Entity {

    /*
     * The function hydrate clean the name file
     *
     * He permit to initialize the getters & setters Automatically
     */

    protected function hydrate($class, $data) {

        foreach ($data as $champ => $valeur) {

            $prop = explode("_", $champ);


            $method = "set" . ucfirst($prop[0]);


            if (method_exists($class, $method)) {
                $this->$method($valeur);
            }
        }
    }

}
