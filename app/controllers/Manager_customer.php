<?php

class Manager_customer extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $customer = new Customer();

        $data = $this->getCustomerdata($customer);

        // show($data);
        $data['customer'] = $data;


        $this->view('manager/customers', $data);
    }

    // public function profile($id = null)
    // {

    //     $id = $id ?? Auth::getId();

    //     $user = new User();
    //     $data['row'] = $user->first(['id'=>$id]);


    //     $data['title'] = "Profile";
    //     $this->view('customer/cus_profile', $data);
    // }

    private function getCustomerdata($customer)
    {
        $data = $customer->findAll();

        //    $data = $branch_id->where($arr);
        // show($data);
        return $data;
    }
}
