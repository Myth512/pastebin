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

    private function convertTime(string $time): ?string
    {
        if ($time === 'never')
            return null;

        $offset = match($time) {
            '10m' => 10 * 60,
            '1h' => 60 * 60,
            '1d' => 24 * 60 * 60,
            '1w' => 7 * 24 * 60 * 60,
        };

        $result = time() + $offset;

        return date('Y-m-d H:i:s', $result);
    }

    public function store(): void
    {
        $content = $_POST['content'];
        $expiration = $this->convertTime($_POST['expiration']);

        $paste = new Paste();

        $id = $paste->save($content, $expiration);

        header("Location: /$id");
    }
}