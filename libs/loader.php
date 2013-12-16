<?php

namespace framework\libs;

class loader {

    public $Classmap;

    public function register() {
        return spl_autoload_register(array(__NAMESPACE__ . "\loader", "autoload"));
    }

    public function registerClassmap($Classmap) {
        foreach ($Classmap as $namespace => $classpath) {
            if (is_array($classpath)) {
                foreach ($classpath as $classname => $value) {
                    $this->Classmap[$namespace . "\\" . $classname] = $value;
                }
            } else {
                $this->Classmap[$namespace . "\\" . $classpath] = $classpath;
            }
        }
        return $this;
    }

    protected function autoload($class) {
        foreach ($this->Classmap as $classpath) {
            if (array_key_exists($class, $this->Classmap)) {
                $path = ROOT_FOLDER . $classpath . EXT;
                if (file_exists($path)) {
                    require_once $path;
                } else {
                    throw new \Exception("the class doesn't exist !");
                }
            }
        }
    }
}

?>
