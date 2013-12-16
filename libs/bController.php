<?php

namespace framework\libs;

class bController {

    private static $getInstance;

    private function __construct() {
        ;
    }

    public static function getInstance() {
        if (!self::$getInstance instanceof bController) {
            self::$getInstance = new self;
        }
        return self::$getInstance;
    }

    public static function loadC($cName, $mName = null) {
        $cName = strtolower($cName);
        if (!is_null($mName)) {
            $nClass = "framework\\" . $mName . "\\controllers\\" . ucfirst($cName) . "Controller";
            return new $nClass();
        } else {
            $nClass = "framework\controllers\\" . ucfirst($cName) . "Controller";
            return new $nClass;
        }
    }

}

?>
