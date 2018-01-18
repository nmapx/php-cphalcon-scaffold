<?php

require_once __DIR__ . '/../app/autoload.php';

$kernel = new Kernel();

$kernel->load();
$response = $kernel->handleRequest();
$kernel->destroy();

echo $response;
