<html ng-app="app">
    <head>
        <meta charset="UTF-8"/>
        <title>Register or Log in</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="css/login.css"/>
    </head>
    <body>
        <div id="container">
            <div id="register">
                <form action="register.php" method="POST">
                    <input type="text" name="username" placeholder="Enter your username"/>
                    <input type="text" name="email" placeholder="Enter your email"/>
                    <input type="password" name ="password" placeholder = "enter your password"/>
                    <input type="text" name="f_name" placeholder="First name"/>
                    <input type="text" name="l_name" placeholder="Last name"/>
                    <input type="submit" value="REGISTER"/>
                </form>
            </div>
            <div id="login">
                <form action="login.php" method="POST">
                    <input type="text" name="username" placeholder="Enter your username"/>
                    <input type="password" name ="password" placeholder = "enter your password"/>
                    <input type="submit" value="LOG IN"/>
                </form>
            </div>
        </div>
    </body>
</html>