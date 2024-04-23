<?php

class Emp_dashboard extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $branch ='Borella';

        $id = 13;
        $BranchName= $this->getBranchName($id);
        $data['BranchName'] = $BranchName;

       

         $check = new CheckoutOrder();

        $getData = $this->getOrderdata($check);
        // show($data);
        $data['getData'] = $getData;

        $count=$this->totalOrders($check);
       // show($count);
        $data['count'] = $count; 
       //show($data['count']);

       $customer = new User();
       $getCusData = $this->getCustomerdata($customer);
       // show($data);
       $data['getCusData'] = $getCusData;

      
       $getTotalcost = $this->getTotalCost($check);
       $data['getTotalcost'] = $getTotalcost;

       $getOnlineorders = $this->getOnlineorders($check);
       //show($data['getOnlineorders']);
       $data['getOnlineorders'] = $getOnlineorders ;

       $getPickuporders = $this->getPickuporders($check);
       $data['getPickuporders '] = $getPickuporders ;

       $branch = new Branches();
       $getBranchcount = $this->getBranchcount ($branch);
       $data['getBranchcount '] = $getBranchcount  ;

       $this->view('employee/employee_dashboard', $data);
        
     
     

    }
    private function getBranchName($id){
        $branch = new Branches();

        $arr['id']=$id;

       $data = $branch->where($arr);
       return $data;

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
        $data = $order->findAll('id','DESC',3);

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
   
    private function getCustomerdata($user)
    {
        $data = $user->count_Customers();
        // show($data);
       return $data;
    }

    private function getTotalCost($check){
        $data = $check->sumOfColumn();
        return $data;
    }

    private function getOnlineorders($check){
        $data = $check->count_online();
        return $data;

    }

    
    private function getPickuporders($check){
        $data = $check->count_pickup();
        return $data;

    }

    private function getBranchcount ($branch)
    {
        $data = $branch->countall();
        // show($data);
       return $data;
    }


}
