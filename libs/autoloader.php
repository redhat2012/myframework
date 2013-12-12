<?php

namespace framework\libs;

class autoloader {

    public function __construct() {
        return spl_autoload_register(array(__NAMESPACE__ . "\autoloader", "autoload"));
    }

    public static function autoload($class) {
        $class = substr($class, strripos($class, "\\"));
        if (file_exists(ROOT_LIBS . trim($class, "\\") . EXTENTION_PHP)) {
            require_once ROOT_LIBS . trim($class, "\\") . EXTENTION_PHP;
        }
    }

}

?>
