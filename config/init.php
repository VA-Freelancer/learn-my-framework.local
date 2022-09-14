<?php

define("DEBUG", 0);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/vproger');
define("HELPERS", ROOT . '/vendor/vproger/helpers');
define("CACHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');
define("LAYOUT", "ishop");
define("PATH", "http://my-framework.local");
define("ADMIN", "http://my-framework.local/admin");
define("NO_IMAGE", "uploads/no_image.jpg");


require_once ROOT . "/vendor/autoload.php";