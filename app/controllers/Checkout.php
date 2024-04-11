<?php

class Checkout extends Controller
{
    public function index($id = null)
    {
        $data['errors'] = [];
        $CheckoutModel = new CheckoutModel();
        $ProductModel = new ProductModel(); // Add this line
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productIds = $_POST['product_ids'];
            $quantities = $_POST['quantities'];
            $allProductIds = [];
            $allQuantities = [];

            for ($i = 0; $i < count($productIds); $i++) {
                $productId = $productIds[$i];
                $quantity = $quantities[$i];

                $allProductIds[] = $productId;
                $allQuantities[] = $quantity;

                // Get the current quantity of the product
                $product = $ProductModel->find($productId);
                $currentQuantity = $product->quantity;

                // Calculate the new quantity
                $newQuantity = $currentQuantity - $quantity;

                // Update the quantity in the database
                $ProductModel->updateQuantity($productId, $newQuantity);
            }

            $validatedData = $CheckoutModel->validate($_POST);
            if (($validatedData)) {
                $validatedData['product_ids'] = $allProductIds;
                $validatedData['quantities'] = $allQuantities;
                $lastInsertId = $CheckoutModel->saveData($validatedData);
                redirect('clear_cart');
            } else {
                $data['errors'] = $CheckoutModel->errors;
            }
        }
        $data['title'] = "Checkout";
        $this->view('customer/checkout', $data);
    }
}