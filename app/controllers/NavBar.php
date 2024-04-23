<?php

class NavBar extends Controller
{
    public function index()
    {
        // Get the logged-in user's ID
        $userId = $_SESSION['USER_DATA']->id;

        // Create an instance of the CheckoutModel class
        $checkoutModel = new CheckoutModel();

        // Get the user's last order type
        $lastOrderType = $checkoutModel->getLastOrderType($userId);
        // Pass the data to the view
        $data['title'] = "NavBar";
        $data['lastOrderType'] = $lastOrderType;
        $this->view('includes/NavBar', $data);
    }
}
