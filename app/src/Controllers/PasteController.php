<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Paste;
use App\View;

class PasteController
{
    public function index(): View
    {
        $uri = $_SERVER['REQUEST_URI'];

        $id = substr($uri, 1);

        $paste = new Paste();

        $data = $paste->load($id);

        return new View('paste', $data);
    }

    public function store(): void
    {
        $content = $_POST['content'];

        $paste = new Paste();

        $id = $paste->save($content);

        header("Location: /$id");
    }
}