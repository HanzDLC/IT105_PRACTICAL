<?php
class Model
{
    public $db = null;

    function __construct()
    {
        try {
            $this->db = new mysqli('localhost', 'root', '', 'dogs');
        } catch (mysqli_sql_exception $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getDogList()
    {
        $data = array();
        $queryGetDogs = mysqli_query($this->db, "SELECT * FROM dog_records");

        while ($getRow = mysqli_fetch_object($queryGetDogs)) {
            $data[] = $getRow; // Add the row to the results (data) array
        }
        return $data;
    }

    public function getDogsByBreed($breed = null)
    {
        $data = array();
        if ($breed) {
            // Prepare statement to prevent SQL injection
            $stmt = $this->db->prepare("SELECT * FROM dog_records WHERE dog_breed = ?");
            $stmt->bind_param("s", $breed);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($getRow = $result->fetch_object()) {
                $data[] = $getRow; // Add the row to the results (data) array
            }
        } else {
            return $this->getDogList(); // Return all dogs if no breed specified
        }
        return $data;
    }

    public function fetchDogByName($dog_name = null)
    {
        $dog = null;

        if ($dog_name) {
            // Prepare the SQL statement to prevent SQL injection
            $stmt = $this->db->prepare("SELECT * FROM dog_records WHERE dog_name = ?");
            $stmt->bind_param("s", $dog_name); // Bind the dog name to the query
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $dog = $result->fetch_object(); // Get the specific dog details
            }
        }

        return $dog;
    }
}
?>
