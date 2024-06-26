<?php

class pickup_progressbar extends Controller
{
    public function index()
    {
        $CheckoutModel = new CheckoutModel();
        $userId = $_SESSION['USER_DATA']->id; // Get the user ID from the session
        $orderId = $_GET['orderId']; // Get the order ID from the query parameters
        $orderStatus = $CheckoutModel->getOrderStatus($userId, $orderId);
        // show($orderStatus);
        $data['title'] = "pickup_progressbar";
        $data['orderStatus'] = $orderStatus;
        $data['orderId'] = $orderId;
        $this->view('customer/pickup_progressbar', $data);
    }

    public function saveReview()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $ProgressbarModel = new ProgressbarModel();
        $ProgressbarModel->insert($data);

        echo json_encode(['success' => true]);
    }

    public function getOrderStatusJson()
    {
        $CheckoutModel = new CheckoutModel();
        $userId = $_SESSION['USER_DATA']->id; // Get the user ID from the session
        $orderId = $_GET['orderId']; // Get the order ID from the query parameters
        $orderStatus = $CheckoutModel->getOrderStatus($userId, $orderId);
        // Return the order status as a JSON response
        echo json_encode(['orderStatus' => $orderStatus]);
    }
}
