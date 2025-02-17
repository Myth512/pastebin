<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pastebin</title>
</head>
<body>
    <?php if(isset($id)): ?>
        <h1>ID: <?= $id?></h1>
    <?php endif; ?>

    <?php if(isset($created_at)): ?>
        <h1>Created at: <?= $created_at ?></h1>
    <?php endif; ?>

    <?php if(isset($expiration_date)): ?>
        <h1>Expire at: <?= $expiration_date ?></h1>
    <?php endif; ?>

    <?php if(isset($error)): ?>
        <h1>Error: <?= $error?></h1>
    <?php endif; ?>

    <?php if(isset($content)): ?>
        <h1>Content: <?= $content?></h1>
    <?php endif; ?>
</body>
</html>