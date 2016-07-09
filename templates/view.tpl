<html>
    <head></head>
    <body>
        <h1>
            Blog nr 1;
        </h1>
        {foreach from=$posts item=post}
            <li>$post["title"]}, by </a></li>
            {/foreach}
    </body>
</html>