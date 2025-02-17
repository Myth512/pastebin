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
    <?php if(isset($error)): ?>
        <h1><?= $error?></h1>
    <?php else: ?>
        <p><?= $created_at?></p>
        <p><?= $content?></p>
    <?php endif; ?>
</body>
</html>