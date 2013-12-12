<?php

namespace framework;

use framework\libs;

require_once 'config.php';
require_once 'libs/autoloader.php';
new libs\autoloader();

$request = new libs\request();
$request->init();
$router = new libs\router($request);
$router->Dispatch();
?>
