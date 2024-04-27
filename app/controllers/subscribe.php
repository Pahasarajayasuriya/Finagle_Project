<?php

class subscribe extends Controller
{
    public function index()
    {
        $data['title'] = "subscribe";
    }


    public function handleSubscription()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Return a JSON response
            header('Content-Type: application/json');
            echo json_encode(array("success" => true, "message" => "Subscription successful"));
            exit;
        }
    }
}
