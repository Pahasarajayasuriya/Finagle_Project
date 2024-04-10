<?php

class Emp_progress extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();
       


        $branch_id =13;

        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        $data['title'] = "Progress";

        $order = new CheckoutOrder();
       
        $detail = $this->getOrderDetails($order);
        //show($detail);
        //show($data);
        $data['detail'] = $detail;

      
        $driver_details= $this->getDriverDetails($branch_id);
        //show($driver_details);
        $data['driver_details'] = $driver_details;
        //show($data);


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

     private function getDriverDetails($branch_id)
     {

        $user = new User();

        $data = $user->findUsersByRole($branch_id,'driver');
 
        return $data;
 
     }
}
