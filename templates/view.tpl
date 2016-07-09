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
                <button onclick='edit_post(this.id)' id='{$post["id"]}'>Edit post</button>
                <div id='edit_post_{$post["id"]}' style="display:none;">
                    LALA
                </div>
              </div>
            {/foreach}
            <script type="text/javascript">
            function edit_post(id){
                 document.getElementById('edit_post_'+id).style.display="block";
                }
            </script>
    </body>
</html>