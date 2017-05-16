<?php

class Autoloader {
    static public function loader($className) {

        // Cut Root-Namespace
        $className = str_replace( 'WebEvents'.'\\', '', $className );
        // Correct DIRECTORY_SEPARATOR
        $className = str_replace( array( '\\', '/' ), DIRECTORY_SEPARATOR, __DIR__ . DIRECTORY_SEPARATOR . '../src/' . $className . '.php' );
        // Get file real path
        if( false === ( $className = realpath( $className ) ) ) {
            // File not found
            return false;
        } else {
            require_once( $className );
            return true;
        }
    }
}
spl_autoload_register('Autoloader::loader');