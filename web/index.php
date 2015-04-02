<?php

define("ROOT", dirname(__DIR__));

require_once ROOT . '/vendor/autoload.php';

require_once ROOT . '/app/App.php';

use lpccars\app\App;

$app = new App();

$app->run();


