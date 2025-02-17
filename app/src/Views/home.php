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
            <label for="expiration">Expiration</label>
            <br>
            <select name="expiration" id="expiration">
                <option value="never">Never</option>
                <option value="10m">10 Minutes</option>
                <option value="1h">1 Hour</option>
                <option value="1d">1 Day</option>
                <option value="1w">1 Week</option>
            </select>
            <br>
            <button type="submit">Create</button>
        </form>
    </div>

</body>
</html>