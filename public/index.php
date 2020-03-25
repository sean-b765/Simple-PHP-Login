<html>

    <head>
        <link rel="stylesheet" href="../style.css"/>
    </head>

    <body>
        <?php

        require_once('../private/initialize.php');
        if ($session->is_logged_in()) {
            
            if (isset($_POST['submit'])) {
                // logout
                $session->logout();
                header('Location: ../');
            }

        ?>  
        <div id="userArea">

            <div class="logout">

                <form action='' method='POST'>
                    <button type="submit" id="submit" name="submit">Logout</button>
                </form>

            </div>

            <p><?php echo 'Welcome ' . $session->username;?></p>

            <ul>
                <li><a href="show_users.php">Show Users</a></li>
                <li><a href="add_user.php">Add User</a></li>
            </ul>
        </div>    

        <?php 
        // user not logged in
        } else {
            echo "Session expired. Login again.";
        } ?>
    </body>
</html>