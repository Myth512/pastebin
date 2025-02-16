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
    <div class="new-paste">
        <form action="/paste" method="post">
            <label for="paste-content">New Paste</label>
            <br>
            <textarea name="content" id="paste-content" cols="30" rows="10"></textarea>
            <br>
            <button type="submit">Create</button>
        </form>
    </div>

</body>
</html>