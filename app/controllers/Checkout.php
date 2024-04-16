<?php

class Checkout extends Controller
{
    public function index($id = null)
    {
        $data['errors'] = [];
        $CheckoutModel = new CheckoutModel();
        $ProductModel = new ProductModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check if the product_ids and quantities keys are set in the $_POST array
            if (isset($_POST['product_ids']) && isset($_POST['quantities'])) {
                $productIds = $_POST['product_ids'];
                $quantities = $_POST['quantities'];
                $allProductIds = [];
                $allQuantities = [];

                for ($i = 0; $i < count($productIds); $i++) {
                    $productId = $productIds[$i];
                    $quantity = $quantities[$i];

                    $allProductIds[] = $productId;
                    $allQuantities[] = $quantity;
                }

                $validatedData = $CheckoutModel->validate($_POST);
                if (($validatedData)) {
                    if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
                        // Add latitude and longitude to the validated data
                        $validatedData['latitude'] = $_POST['latitude'];
                        $validatedData['longitude'] = $_POST['longitude'];
                    }

                    $validatedData['product_ids'] = $allProductIds;
                    $validatedData['quantities'] = $allQuantities;

                    // Move the quantity reduction logic here
                    for ($i = 0; $i < count($productIds); $i++) {
                        $productId = $productIds[$i];
                        $quantity = $quantities[$i];

                        // Get the current quantity of the product
                        $product = $ProductModel->find($productId);
                        $currentQuantity = $product->quantity;

                        // Calculate the new quantity
                        $newQuantity = $currentQuantity - $quantity;

                        // Update the quantity in the database
                        $ProductModel->updateQuantity($productId, $newQuantity);
                    }
                    if ($_POST['payment_method'] == 'cash') {
                        // If it is, save the data to the database and redirect to the clear cart page
                        $lastInsertId = $CheckoutModel->saveData($validatedData);
                        redirect('clear_cart');
                    } else if ($_POST['payment_method'] == 'card') {
                        if (isset($_SESSION['orderId'])) {
                            // show($_SESSION['orderId']);
                            // unset($_SESSION['orderId']);
                            // If the orderId is set in the session, save the data to the database and redirect to the clear cart page
                            $lastInsertId = $CheckoutModel->saveData($validatedData);
                            $CheckoutModel->updatePaymentStatus($lastInsertId, 'Completed');
                            unset($_SESSION['orderId']);
                            redirect('clear_cart');
                        } else {
                            // echo "Order Id not set in the session";
                            // If the orderId is not set in the session, save the validated data to the session
                            $_SESSION['checkout_data'] = $validatedData;
                        }
                    }
                } else {
                    $data['errors'] = $CheckoutModel->errors;
                }
            }
        }
        $data['title'] = "Checkout";
        $this->view('customer/checkout', $data);
    }

    public function saveCardPayment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $orderId = $_POST['orderId'];
            $_SESSION['orderId'] = $orderId;
            // TODO: handle response
        }
    }

    public function Payherprocess()
    {

        $id = Auth::getId(); // Get the ID of the currently logged in user

        $UserModel = new User();
        $user = $UserModel->first(['id' => $id]); // Get the user data

        $CheckoutModel = new CheckoutModel();
        $lastOrderId = $CheckoutModel->getLastOrderIdAll();
        if (isset($_COOKIE['totalCost'])) {
            $totalCost = $_COOKIE['totalCost'];
        } else {
            // Handle the case where the cookie is not set
        }

        $amount = $totalCost;
        $merchant_id = "1226489";
        $order_id = $lastOrderId + 1;
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

        $array["fist_name"] = $user->username;
        $array["last_name"] = $user->username;
        $array["email"] = $user->email;
        $array["phone"] = $user->teleno;
        $array["address"] = $user->address;
        $array["city"] = "Borella";
        $array["item"] = "Order Payment";

        $array['amount'] = $amount;
        $array['merchant_id'] = $merchant_id;
        $array['order_id'] = $order_id;
        $array['currency'] = $currency;
        $array['hash'] = $hash;

        $jsonObject = json_encode($array);
        echo $jsonObject;
    }
}
