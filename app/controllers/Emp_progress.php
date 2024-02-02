<?php

class Emp_progress extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();


        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        $data['title'] = "Progress";

        $order = new Checkout();
        // show($detail);
        $data = $this->getOrderDetails($order);
        // show($data);
        $data['detail'] = $data;

        $this->view('employee/order_assign', $data);
    }

    // public function profile($id = null)
    // {
        
    //     $id = $id ?? Auth::getId();

    //     $user = new User();
    //     $data['row'] = $user->first(['id'=>$id]);
        

    //     $data['title'] = "Profile";
    //     $this->view('customer/cus_profile', $data);
    // }


    private function getOrderDetails($order)
    {
        $data = $order->findAll();

        //    $data = $branch_id->where($arr);
        // show($data);
        return $data;
    }
}
