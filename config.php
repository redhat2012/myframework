<?php

set_include_path(__DIR__);
define("ROOT_FOLDER", str_replace("\\", "/", get_include_path()));
define("ROOT_APP", ROOT_FOLDER . "/app/");
define("ROOT_LIBS", ROOT_FOLDER . "/libs/");
define("EXTENTION_PHP", ".php");
?>
