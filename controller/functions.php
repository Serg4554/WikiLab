<?php
mb_http_output('UTF-8');
mb_internal_encoding('UTF-8');
ob_start('mb_output_handler');
date_default_timezone_set('UTC');
$root = $_SERVER['DOCUMENT_ROOT'];

/**
 * Autoload
 * Loads all core dependencies.
 *
 * @param mixed $class
 */
function autoloadModel($class) {
    global $root;
    $class = ucwords(strtolower($class));
    $file = $root.'/core/'.$class.".php";
    if (is_readable($file)) {
        /** @noinspection PhpIncludeInspection */
        include_once $file;
    }
}


//Autoload:
spl_autoload_register("autoloadModel");