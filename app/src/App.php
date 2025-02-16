<?php

declare(strict_types=1);

namespace App;

use Dotenv\Dotenv;
use PDO;

class App
{
    private static PDO $pdo;

    public function __construct(private Router $router)
    {
    }

    public function run(): void
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $name = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];

        self::$pdo = new PDO("mysql:host=$host;dbname=$name", $username, $password);

        $this->router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

    }

    public static function db(): PDO
    {
        return self::$pdo;
    }

}