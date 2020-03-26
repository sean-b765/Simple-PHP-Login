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

            <table class="add_user_area">
                
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>

                <tr>
                    <form action="" method="POST" class="add_user">
                        <td>
                            <input type="text" id="username" name="username" />
                        </td>
                        <td>
                            <input type="email" id="email" name="email" />
                        </td>
                        <td>
                            <input type="text" id="password" name="password" />
                        </td>

                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" id="add" name="add">Add User</button>
                            </td>
                        </tr>
                            
                    
                    </form>
                </tr>

            </table>
        </div>    

        <?php 

        if (isset($_POST['add'])) {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $regex = "/[\w\-.]+@([\w-]+\.)+[\w\-]+[\.(com|edu|gov|info|net|com\.au)]/";
            // regex to validate email
            $email_regex = preg_match($regex, $email);

            $n_regex = "/[a-zA-Z0-9\._]/";
            // regex for alphanumeric name with . and _
            $name_regex = preg_match($n_regex, $username);


            $user_exists = user_exists($username, $password);

            // check valid email
            if ($email_regex) {
                // check valid name
                if ($name_regex) {
                    if (!$user_exists) {
                
                        if (insert_new_user($username, $email, $password) === TRUE) {
                            echo 'User added!';
                        } else {
                            echo 'Something went wrong';
                        }
        
                    } else {
                        echo 'Username/Password combo already exists.';
                    }
                } else {
                    echo 'Invalid name. Can only be alphanumeric and contain ( _ . )';
                }
                
            } else {
                echo 'Please enter a valid email.';
            }
        }

        // user not logged in
        } else {
            echo "Session expired. Login again.";
        } ?>
    </body>
</html>