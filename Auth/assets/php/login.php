<?php
include_once('database.php');

class User extends DbConnection
{

    public function __construct()
    {

        parent::__construct();
    }

    public function check_login($table, $username, $password)
    {
        // Use prepared statements to avoid SQL injection
        $sql = "SELECT * FROM $table WHERE email = ? AND pwd = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            return $row['id'];
        } else {
            return false;
        }
    }


    public function details($sql)
    {

        $query = $this->connection->query($sql);

        $row = $query->fetch_array();

        return $row;
    }

    public function get_safe($value)
    {

        return $this->connection->real_escape_string($value);
    }
}
?>