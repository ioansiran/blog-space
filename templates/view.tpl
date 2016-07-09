<html>
    <head>
        
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/index.css"/>
    </head>
    <body>
        <h1>
            
        </h1>
        {foreach from=$posts item=post}
             <div class="card">
                
                <h1 class="blog_title">{$post["title"]}</h1>
                <h4 class="blog_date">Date Created: {$post["date"]}</h1>
                <h4 class="author">{$post["content"]}</h1>
              </div>
            {/foreach}
    </body>
</html>