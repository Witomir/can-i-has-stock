<?php
define('APP_PATH', realpath(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR);
require_once APP_PATH . 'Autoloader.php';

$autoload = new Autoloader();
$autoload->registerNamespace('Gpw');
$autoload->registerNamespace('StockInfoFetcher');
$config = \Gpw\Config::getInstance();
$app = new \Gpw\Application();
$app->setConfig($config)
	->setArguments($argv)
	->run();