<html>
    <head></head>
    <body>
        <h1>
            Blogs by Me
        </h1>
        {foreach from=$blogs item=blog}
            <li><a href="view.php?id={$blog["id"]}">{$blog["title"]}, by {$blog["owner"]}</a></li>
            {/foreach}
    </body>
</html>