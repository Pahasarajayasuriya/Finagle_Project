<?php
// controller.php

class Assign_goals extends Controller
{

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['goal'])) {
    // Retrieve the goal data from the POST request
    $goal = $_POST['goal'];

    // Validate the goal data if needed

    // Perform database insertion
    require_once 'Assign_goalsModel.php'; // Include the script for saving the goal to the database

    // Call the function to save the goal to the database
    $result = insertGoal($goal);

    // Check if the insertion was successful
    if ($result) {
        // Respond with a success message
        http_response_code(200);
    } else {
        // Respond with an error message
        http_response_code(500);
    }
} else {
    // Respond with a bad request error if the request method is not POST or goal data is not provided
    http_response_code(400);
}


}
