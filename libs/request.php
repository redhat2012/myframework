<?php

namespace framework\libs;

class request {

    private $module;
    private $controller;
    private $action;
    private $params;

    public function init() {

        $qs = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : null;
        $qs1 = ltrim(substr($qs, strpos($qs, "=")), "=");
        $qs2 = trim($qs1, "/");
        $qs3 = explode("/", $qs2);
        $this->module = null;
        if (preg_match("/^mo[a-z]+$/i", $qs3[0])) {
            $this->module = strtolower(substr($qs3[0], 2));
            array_shift($qs3);
        }

        $this->controller = !empty($qs3[0]) ? strtolower($qs3[0]) : "Home";
        $this->action = !empty($qs3[1]) ? strtolower($qs3[1]) : "Index";
        $this->params = array_slice($qs3, 2);
    }

    public function getmodule() {
        return $this->module;
    }

    public function getcontroller() {
        return ucfirst($this->controller);
    }

    public function getaction() {
        return ucfirst($this->action);
    }

    public function getparams() {
        return !empty($this->params) ? $this->params : null;
    }

}

?>
