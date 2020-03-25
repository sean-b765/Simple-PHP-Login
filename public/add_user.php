<html>

    <head>
        <link rel="stylesheet" href="../style.css"/>
    </head>

    <body>
        <?php

        require_once('../private/initialize.php');
        if ($session->is_logged_in()) {
            
            if (isset($_POST['logout'])) {
                // logout
                $session->logout();
                header('Location: ../');
            }

        ?>  
        <div id="userArea">

            <div class="logout">

                <form action='' method='POST'>
                    <button type="submit" id="logout" name="logout">Logout</button>
                </form>

            </div>

            <p>Add New User</p>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="show_users.php">Show User</a></li>
            </ul>

            <form action="" method="POST" class="add_user">
                <input type="text" id="username" name="username" />
                <input type="text" id="password" name="password" /><br><br>
                <button type="submit" id="add" name="add">Add User</button>
            </form>
        </div>    

        <?php 

        if (isset($_POST['add'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            if (!user_exists($username, $password)) {
                
                if (insert_new_user($username, $password) === TRUE) {
                    echo 'User added!';
                } else {
                    echo 'Something went wrong :/';
                }

            } else {
                echo 'Username/Password combo already exists.';
            }
        }


        // user not logged in
        } else {
            echo "Session expired. Login again.";
        } ?>
    </body>
</html>