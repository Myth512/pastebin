<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use App\Test;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();