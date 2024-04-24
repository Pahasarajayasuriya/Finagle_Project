<?php
class Manager_customer extends Controller
{
    public function index()
    {
        $customerModel = new User();
        $checkoutModel = new CheckoutModel();
        $customers = $customerModel->getCustomer();
        $data['customer'] = $customers;
        $this->view('manager/customers', $data);
    }
}
