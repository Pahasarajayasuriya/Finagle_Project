<?php

class Emp_dashboard extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $order = new Orders();

        $getData = $this->getOrderdata($order);
        // show($data);
        $data['getData'] = $getData;

        $count=$this->totalOrders($order);
       // show($count);
        $data['count'] = $count; 
       //show($data['count']);

       $customer = new Customer();
       $getCusData = $this->getCustomerdata($customer);
       // show($data);
       $data['getCusData'] = $getCusData;

       $cost = new Checkout();
       $getTotalcost = $this->getTotalCost($cost);
       $data['getTotalcost'] = $getTotalcost;


        $this->view('employee/employee_dashboard', $data);
        
     
     

    }

    // public function profile($id = null)
    // {

    //     $id = $id ?? Auth::getId();

    //     $user = new User();
    //     $data['row'] = $user->first(['id'=>$id]);


    //     $data['title'] = "Profile";
    //     $this->view('customer/cus_profile', $data);
    // }

    private function getOrderdata($order)
    {
        $data = $order->findAll('order_id','DESC',3);

        //    $data = $branch_id->where($arr);
        // show($data);
        return $data;
    }

    private function totalOrders($order)
    {

        $data = $order->countall();
         // show($data);
        return $data;
    }
   
    private function getCustomerdata($customer)
    {
        $data = $customer->countall();
        // show($data);
       return $data;
    }

    private function getTotalCost($cost){
        $data = $cost->sumall();
        return $data;
    }
}
