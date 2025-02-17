<?php

declare(strict_types=1);

namespace App\Models;

use App\App;

function randomString(int $length): string
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $result = '';

    for ($i = 0; $i < $length; $i++) {
        $result .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $result;
}

class Paste
{
    private function saveToFile(string $id, string $content): void
    {
        $path = UPLOAD_PATH . $id . '.txt';

        file_put_contents($path, $content);
    }

    private function saveToDatabase(string $id): void
    {
        $db = App::db();

        $stmt = $db->prepare(
            'INSERT INTO pastes (id, created_at) VALUES (?, NOW())'
        );

        $stmt->execute([$id]);
    }

    public function save(string $content): string
    {
        $id = randomString(8);

        $this->saveToFile($id, $content);
        $this->saveToDatabase($id);

        return $id;
    }

    private function loadFromFile(string $id): string
    {
        $path = UPLOAD_PATH . $id . '.txt';

        return file_get_contents($path);
    }

    private function loadFromDatabase(string $id): array
    {
        $db = App::db();

        $stmt = $db->prepare(
            'SELECT * FROM pastes WHERE id = ?'
        );

        $stmt->execute([$id]);

        $data = $stmt->fetch();

        if ($data === false)
            return ['error' => 'Paste not found.'];

        return $data;
    }

    public function load(string $id): array
    {
        $data = $this->loadFromDatabase($id);

        if (isset($data['error']))
            return $data;

        $content = $this->loadFromFile($id);

        $data['content'] = $content;

        return $data;
    }

}