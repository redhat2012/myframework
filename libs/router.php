<?php

namespace framework\libs;

class router {

    const mNamespace = "\\framework\\app\\";
    const nModules = "modules\\";
    const nControllers = "controllers\\";

    private $request;

    public function __construct(request $request) {
        $this->request = $request;
    }

    public function Dispatch() {
        $cFilename = "controllers/" . strtolower($this->request->getcontroller()) . EXTENTION_PHP;
        if (!is_null($this->request->getmodule())) {
            $cPath = ROOT_APP . "modules/" . $this->request->getmodule() . "/" . $cFilename;
            $cName = self::mNamespace . self::nModules . self::nControllers . $this->request->getcontroller() . "Controller";
        } else {
            $cPath = ROOT_APP . $cFilename;
            $cName = self::mNamespace . self::nControllers . $this->request->getcontroller() . "Controller";
        }

        if (file_exists($cPath)) {
            require_once $cPath;
        } else {
            throw new ex("the file doesn't exist . ");
        }

        $iController = new $cName();
        if (method_exists($iController, $this->request->getaction())) {
            $iController->{$this->request->getaction()}($this->request->getparams());
        } else {
            throw new ex("the action doesn't exist .");
        }
    }

}

?>
