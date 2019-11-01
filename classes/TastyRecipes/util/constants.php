<?php

namespace Chat\Util;

use Id1354fw\Util\Classes;

/**
 * Defines constants used by the chat application
 * 
 * @author Simon Lagerqvist, simlag@kth.se
 */
class Constants {
    
    const DATABASE_ADRESS = 'localhost';
    
    const DATABASE_USER = 'root';
    
    const DATABASE_PASS = 'mysql';
    
    const DATABASE_NAME = 'tastyrecipes';
    

    /**
     * @return string The path to the directory where view fragments (header, footer, etc) 
     *                 are located.
     */
    public static function getViewFragmentsDir() {
        return $_SERVER['DOCUMENT_ROOT'] . Classes::getContextPath() . '/resources/fragments/';
    }

}