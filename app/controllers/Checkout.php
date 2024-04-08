<?php

class Checkout extends Controller
{
    public function index($id = null)
    {
        $data['errors'] = [];
        $CheckoutModel = new CheckoutModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatedData = $CheckoutModel->validate($_POST);
            show($validatedData);
            if (($validatedData)) {
                show($validatedData);
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