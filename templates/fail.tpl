<html >
    <head>
        <meta charset="UTF-8"/>
        <title>Register or Log in</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="css/login.css"/>
    </head>
    <body>
        <div id="container">
            {foreach from=$messages item=message}
            <li>{$message}</li>
            {/foreach}
        </div>
    </body>
</html>