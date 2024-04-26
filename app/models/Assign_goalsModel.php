<?php
// Model.php

class Assign_goalsModel extends Model {
    
    protected $table = "goals";
    protected $allowedColumns = [
        'id',
        'username',
        'goal',
        
    ];
    
    public function insertGoal($goal) {
        // Create a database connection
        $conn = new mysqli();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute SQL query to insert goal into the database
        $stmt = $conn->prepare("INSERT INTO goals (goal) VALUES (?)");
        $stmt->bind_param("s", $goal);
        $result = $stmt->execute();

        // Close statement and connection
        $stmt->close();
        $conn->close();

        return $result; // Return true if insertion was successful, false otherwise
    }
}
?>
