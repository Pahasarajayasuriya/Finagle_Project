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

    public function Payherprocess()
    {
        
        $amount = 3000;
        $merchant_id = "1226489";
        $order_id = uniqid();
        $merchant_secret = "ODQ4NjM1NTMzMzMyMTc2ODYyMjExNzgyODE0OTI0MDcwNTcwOTc5";
        $currency = "LKR";
        
        
        $hash = strtoupper(
            md5(
                $merchant_id . 
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );

        $array = [];
        $array["fist_name"] = "saman";
        $array["last_name"] = "perera";
        $array["email"] = "saman@gmail.com";
        $array["phone"] = "0771234567";
        $array["address"] = "No 1, Galle Road";
        $array["city"] = "Colombo";
        $array["item"] = "Finagle Lanka (Pvt) Ltd";
        $array['country'] = "Sri Lanka";

        $array['amount'] = $amount;
        $array['merchant_id'] = $merchant_id;
        $array['order_id'] = $order_id;
        $array['currency'] = $currency;
        $array['hash'] = $hash;

        $jsonObject = json_encode($array);
        echo $jsonObject;
    }
}
