<?php
class Manager_customer extends Controller
{
    public function index()
    {
        $customerModel = new Customer();
        $data['customer'] = $customerModel->getCustomers();

        $this->view('manager/customers', $data);
    }
}
?>