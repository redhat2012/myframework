<?php

namespace framework;

use framework\libs;

require_once 'config.php';
require_once 'libs/loader.php';
$Classmap = require_once 'autoload_classmap.php';

$loader = new libs\loader();
$loader->registerClassmap($Classmap)->register();

$request = new libs\request();
$request->init();

$router = new libs\router($request);
$bController = libs\bController::getInstance();
$router->Dispatch($bController);
?>
