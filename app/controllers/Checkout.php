<?php

class Checkout extends Controller
{
    public function index($id = null)
    {
        $data['errors'] = [];
        $CheckoutModel = new CheckoutModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['payment'] = isset($_POST['payment']) ? $_POST['payment'] : null;
            $_POST['gift'] = isset($_POST['gift']) ? $_POST['gift'] : null;
            $_POST['delivery-pickup'] = isset($_POST['delivery-pickup']) ? $_POST['delivery-pickup'] : null;
            $validatedData = $CheckoutModel->validate($_POST);
            if (($validatedData)) {
                $CheckoutModel->saveData($validatedData);
                redirect('clear_cart');
            } else {
                $data['errors'] = $CheckoutModel->errors;
            }
        }
        $data['title'] = "Checkout";
        $this->view('customer/checkout', $data);
    }
}