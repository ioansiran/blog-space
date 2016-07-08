<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Smarty</title>
    
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/index.css"/>
  </head>
  <body>
      <div id="top_bar">
        <h1>Hello, {$username}!</h1>
        <a href="write.php">Write new blog post</a>
        </div>
    
      {foreach from=$blogs item=blog}
      <div class="card">
        
        <h1 class="blog_title">{$blog["TITLE"]}</h1>
        <h4 class="blog_date">Date Created: {$blog["DATE_CREATED"]}</h1>
        <h4 class="author">Author:{$blog["F_NAME"]} {$blog["L_NAME"]}</h1>
      </div>
      {/foreach}
    
  </body>
</html>