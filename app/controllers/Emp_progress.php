<?php

class Emp_progress extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();
       


        $branch ='Borella';

       

        $user = new User();

        $data['row'] = $user->first(['id'=>$id]);
        $data['title'] = "Progress";

        $order = new CheckoutOrder();
       
        $detail = $this->getOrderDetails($order);
        //show($detail);
        $data['detail'] = $detail;

        $items = $this->getItemsDetails($order);
        //show($items);
        $data['$items'] = $items;

      
        $driver_details= $this->getDriverDetails($branch);
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
        return $data;
    }

    private function getItemsDetails($order)
    {
       
        $order_id =51;
        $data = $order->findOrderdetails($order_id);
        return $data;
 


    }


     private function getDriverDetails($branch)
     {

        $user = new User();
        $data = $user->findUsersByRole($branch,'driver');
 
        return $data;
 
     }
}
