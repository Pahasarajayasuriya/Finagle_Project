<?php

class Progressbar extends Controller
{
    public function index()
    {
        $CheckoutModel = new CheckoutModel();
        $userId = $_SESSION['USER_DATA']->id; // Get the user ID from the session
        $orderStatus = $CheckoutModel->getLastOrderStatus($userId);
        $orderId = $CheckoutModel->getLastOrderId($userId);
        $data['title'] = "Progressbar";
        $data['orderStatus'] = $orderStatus;
        $data['orderId'] = $orderId;
        $this->view('customer/progressbar', $data);
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
        $orderStatus = $CheckoutModel->getLastOrderStatus($userId);

        // Return the order status as a JSON response
        echo json_encode(['orderStatus' => $orderStatus]);
    }
}
