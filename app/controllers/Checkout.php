<?php

class Checkout extends Controller
{
    public function index($id = null)
    {
        $data['errors'] = [];
        $CheckoutModel = new CheckoutModel();
        $ProductModel = new ProductModel();
        // Fetch all branches
        $branches = $CheckoutModel->getAllBranches();

        // Pass branches to the view
        $data['branches'] = $branches;

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
                        $this->sendOrderConfirmationSMS($lastInsertId); // send sms
                        if ($_POST['delivery_or_pickup'] == 'pickup') {
                            redirect('clear_cart_pickup?orderId=' . $lastInsertId);
                        } else {
                            redirect('clear_cart?orderId=' . $lastInsertId);
                        }
                    } else if ($_POST['payment_method'] == 'card') {
                        if (isset($_SESSION['orderId'])) {
                            // If the orderId is set in the session, save the data to the database and redirect to the clear cart page
                            $lastInsertId = $CheckoutModel->saveData($validatedData);
                            $this->sendOrderConfirmationSMS($lastInsertId); // send sms
                            $CheckoutModel->updatePaymentStatus($lastInsertId, 'Completed');
                            unset($_SESSION['orderId']);
                            if ($_POST['delivery_or_pickup'] == 'pickup') {
                                redirect('clear_cart_pickup?orderId=' . $lastInsertId);
                            } else {
                                redirect('clear_cart?orderId=' . $lastInsertId);
                            }
                        } else {
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

    private function sendOrderConfirmationSMS($orderId)
    {
        $number = "+94" . $_POST['phone_number']; // Replace with the customer's phone number
        require __DIR__ . '/../../vendor/autoload.php';


        // Send SMS via Infobip SMS API
        $baseUrl = '6glnnd.api.infobip.com';
        $apiKey = '48aec9f721e803db63f659fc3c34b046-a8406dfc-7c8e-4452-9ef9-19152170386c';
        $configuration = new Infobip\Configuration(host: $baseUrl, apiKey: $apiKey);
        $api = new Infobip\Api\SmsApi(config: $configuration);
        $destination = new Infobip\Model\SmsDestination(to: $number);
        $message = new Infobip\Model\SmsTextualMessage(
            destinations: [$destination],
            text: "Thank you for your order. Your order number is: $orderId
            Any questions? Call us on 011 223 6976.",
            from: "Finagle"
        );
        $request = new Infobip\Model\SmsAdvancedTextualRequest(messages: [$message]);
        $response = $api->sendSmsMessage($request);
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
