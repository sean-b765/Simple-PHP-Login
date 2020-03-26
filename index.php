<html>

    <head>
    
        <link rel="stylesheet" href="style.css"/>

    </head>

    <body>

        <?php

            require_once('private/initialize.php');

            if (isset($_POST['submit'])) {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);

                //echo $username . $password;

                if (user_exists($username, $password)) {
                    $session->login($username);
                    header('Location: ../Simple-PHP-Login/public/index.php');
                }
            }

        ?>

        <div id="container">

            <form action="" method="POST">

                User: <input type="text" name="username" id="username" />

                Pass: <input type="password" name="password" id="password"/>

                <button type="submit" id="submit" name="submit"> Login </button>

            </form>

        </div>

    </body>

</html>