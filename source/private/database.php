<?php
    require_once 'db_credentials.php';

    error_reporting(E_ALL ^ E_DEPRECATED);

class Database
{

    public $conn;


    function __construct()
    {
        $this->connect();

    }//end __construct()


    public function connect()
    {
        $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        if (!$this->conn) {
            die('DB connect failed'.mysqli_error());
        } else {
            $db_select = mysqli_select_db($this->conn, DB_NAME);
            if (!$db_select) {
                die('DB selection failed'.mysqli_error());
            }
        }

    }//end connect()


    public function query($sql)
    {
        // $this->last_query = $sql; last query of db
        $result = mysqli_query($this->conn, $sql);
        return $result;

    }//end query()


}//end class

    $database = new Database();
