<?php

class DbConnection
{

    private $host = 'localhost';
    private $username = 'bsaabco1_bsab';
    private $password = 'PE6lPVc(JssH';
    private $database = 'bsaabco1_bsab';

    protected $connection;

    public function __construct()
    {

        if (!isset($this->connection)) {

            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            } else {
                // echo "connected";
            }
        }

        return $this->connection;
    }
}

// class database {
//     private $host;
//     private $db_user_Name;
//     private $db_password;
//     private $db_name;

//     protected $conn;
//     public function connect() {
//         $this->host = "localhost"; //your host name
//         $this->db_user_Name = "root"; //your user name
//         $this->db_password = ""; // your password
//         $this->db_name = "DB_ISP"; // your database name

//         $conn = new mysqli($this->host, $this->db_user_Name, $this->db_password, $this->db_name);
//         if (!$conn) {
//             # code...
//             echo "failed to connect";
//         } else {
//             // echo "connected";
//         }
//         return $conn;
//     }

// }

?>