<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\ViewNotFoundException;

class View
{
    private string $path;
    private array $args = [];

    public function __construct(string $name, array $args = [])
    {
        $this->path = VIEW_PATH . $name . '.php';
        $this->args = $args;
    }

    public function render(): string
    {
        if (!file_exists($this->path)) {
            throw new ViewNotFoundException();
        }

        foreach($this->args as $name => $value) {
            $$name = $value;
        }

        ob_start();
        include $this->path;
        return ob_get_clean();
    }

    public function __toString(): string
    {
        return $this->render();
    }
}