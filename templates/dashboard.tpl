<html>
    <head>
    
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/index.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <h1>
            Blogs by Me
        </h1>
         <button onclick="create_blog()" value="create blog">Create blog</button>

        {foreach from=$blogs item=blog}
            <div class="card">
                <h1><a href="view.php?id={$blog["id"]}">{$blog["title"]}</a></h1>
                <button onclick="delete_blog({$blog["id"]})" value="delete blog">delete blog</button>
                <button onclick="write_new_post({$blog["id"]})" value="write to blog">write blog</button>
                
            </div>
            {/foreach}
            <div class="result"></div>
            <script type="text/javascript">
                function delete_blog(id){
                   
                    $.post( "delete.php", { blog_id:id})
                      .done(function( data ) {
                        alert( "Data Loaded: " + data );
                        location.reload();

                      });
                }
                function create_blog(){
                    var title=prompt("Enter your blog name");
                    $.post( "newblog.php", { blog_title:title })
                      .done(function( data ) {
                        alert( "Data Loaded: " + data );
                        location.reload();

                      });
                }
                function write_new_post(id){
                    var title=prompt("enter a title");
                    var content = prompt("enter some Content");
                    $.post( "addpost.php", { blog_id:id,post_title:title,post_content:content})
                      .done(function( data ) {
                        alert( "Data Loaded: " + data );
                        location.reload();

                      });
                }
            </script>
    </body>
</html>