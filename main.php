<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

$app = new \App\Controllers\CryptoController();
$app->run();