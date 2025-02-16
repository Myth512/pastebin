<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Paste;
use App\View;

class PasteController
{
    public function index(): View
    {
        return new View('paste', ['uri' => $_SERVER['REQUEST_URI']]);
    }

    public function store(): void
    {
        $content = $_POST['content'];

        $paste = new Paste();

        echo $paste->save($content);
    }
}