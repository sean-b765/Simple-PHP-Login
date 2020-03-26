<html>

    <head>
        <link rel="stylesheet" href="../style.css"/>
    </head>

    <body>
        <?php

        require_once '../private/initialize.php';
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

            <p>User List</p>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="add_user.php">Add User</a></li>
            </ul>

            <table class="user_list">

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>

                <?php
                $sql        = 'SELECT * FROM users';
                    $result = query($sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '  <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['username'].'</td>
                                <td>'.$row['email'].'</td>
                            </tr>';
                    }
                }



                ?>

            </table>

        </div>    

            <?php
            // user not logged in
        } else {
            echo 'Session expired. Login again.';
        }//end if

        ?>
    </body>
</html>
