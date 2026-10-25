<?php
require_once 'database.php';

class DatabaseQuery extends DbConnection
{
    public function __construct()
    {

        parent::__construct();
    }

    // class of  getting data from database
    public function getData($table, $field = '*', $connditio_arr = '', $order_by_field = '', $order_by_type = 'desc', $limit = '')
    {
        $sql = "SELECT $field FROM $table";
        if ($connditio_arr != '') {
            $sql .= ' WHERE ';
            $c = count($connditio_arr);
            $i = 1;
            foreach ($connditio_arr as $key => $val) {
                if ($i == $c) {
                    $sql .= "$key='$val'";
                } else {
                    $sql .= "$key='$val' and ";
                }
                $i++;
            }
        }

        if ($order_by_field != '') {
            $sql .= " order by $order_by_field $order_by_type ";
        }

        if ($limit != '') {
            $sql .= " limit $limit ";
        }
        // die($sql);
        // echo $this->connection;
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
                //  echo "<pre>";
                //  print_r($arr);
                //  echo "</pre>";
            }
            return $arr;
        } else {
            return 0;
        }
    }

    public function insertData($table, $connditio_arr)
    {
        if ($connditio_arr != '') {
            foreach ($connditio_arr as $key => $val) {
                $fieldArr[] = $key;
                $valueArr[] = $val;
            }
            $field = implode(", ", $fieldArr);
            $value = implode("', '", $valueArr);
            $value = "'" . $value . "'";
            $sql = "INSERT INTO $table($field) values($value)";
            // die($sql);
            $result = $this->connection->query($sql);
        }
    }

    public function deleteData($table, $connditio_arr)
    {
        if ($connditio_arr != '') {
            $sql = "DELETE FROM $table WHERE ";
            $c = count($connditio_arr);
            $i = 1;
            foreach ($connditio_arr as $key => $val) {
                if ($i == $c) {
                    $sql .= "$key='$val'";
                } else {
                    $sql .= "$key='$val' and";
                }
                $i++;
            }
            $result = $this->connection->query($sql);
        }
    }

    public function updateData($table, $connditio_arr, $where_value)
    {
        if ($connditio_arr != '') {
            $sql = "UPDATE $table SET ";
            $c = count($connditio_arr);
            $i = 1;
            foreach ($connditio_arr as $key => $val) {
                if ($i == $c) {
                    $sql .= "$key= '$val'";

                } else {
                    $sql .= "$key= '$val', ";
                }
                $i++;
            }
            $sql .= " WHERE id = $where_value ";
            // die($sql);
            $result = $this->connection->query($sql);
        }
    }
    // Method to search for records in the database
    public function globalSearchRecords($search_term, $table, $row, $userId)
    {
        // Query to search for the provided search term in the database
        $sql = "SELECT * FROM $table WHERE $row LIKE '%$search_term%' AND userId = '$userId'";
        $result = $this->connection->query($sql);

        $records = array(); // Array to store search results

        if ($result->num_rows > 0) {
            // If matches are found, fetch and store them
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }

        return $records;
    }
    public function searchRecords($search_term, $table, $row, $userId = '')
    {
        // Query to search for the provided search term in the database
        $sql = "SELECT * FROM $table WHERE $row = '$search_term' ";
        $result = $this->connection->query($sql);

        $records = array(); // Array to store search results

        if ($result->num_rows > 0) {
            // If matches are found, fetch and store them
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }

        return $records;
    }
    public function uploadMedia($file, $uploadDir)
    {
        // Check if file was uploaded without errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('File upload error.');
        }

        // Define allowed file types
        $allowedTypes = [
            'image/jpeg',
            'image/png', // Allowed image types
            'video/mp4',
            'video/avi',
            'video/mov',
            'video/mpeg' // Allowed video types
        ];

        // Check if the uploaded file is of an allowed type
        if (!in_array($file['type'], $allowedTypes)) {
            throw new Exception('Invalid file type. Only JPEG, PNG images, and MP4, AVI, MOV, MPEG videos are allowed.');
        }

        // Check file size (5 MB for images, 50 MB for videos)
        $maxFileSize = (strpos($file['type'], 'video/') === 0) ? 52428800 : 5242880; // 50 MB for videos, 5 MB for images
        if ($file['size'] > $maxFileSize) {
            throw new Exception('File is too large. Maximum size allowed is ' . ($maxFileSize / 1048576) . 'MB.');
        }

        // Generate a unique filename
        $fileName = uniqid() . '_' . basename($file['name']);
        $destination = $uploadDir . '/' . $fileName;

        // Move uploaded file to destination directory
        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            throw new Exception('Error moving uploaded file.');
        }

        // Return the uploaded filename
        return $fileName;
    }



    // Destructor to close the database connection
    public function __destruct()
    {
        $this->connection->close();
    }

    public function get_safe($value)
    {
        return $this->connection->real_escape_string($value);
    }


    public function print_arr($val)
    {
        echo "<pre>";
        print_r($val);
        echo "</pre>";
    }
}
?>