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

       
        $detail = $this->getOrderDetails($order,$branch);
        //show($detail);
        $data['detail'] = $detail;


        $ready = $this->getReadyOrderDetails($order,$branch);
        //show($detail);
        $data['ready'] = $ready;

        $items = $this->getItemsDetails($order);
        //show($items);
        $data['items'] = $items;


       
      
        $driver_details= $this->getDriverDetails($branch);
        //show($driver_details);
        $data['driver_details'] = $driver_details;
        // show($data);

        $dispatch= $this->getDispatchOrderDetails($order,$branch);
        //show($detail);
        $data['dispatch'] = $dispatch;


        $this->view('employee/order_assign', $data);
    }



    private function getOrderDetails($order,$branch)
    {
        $data = $order->findAllPlacedOrders($branch);

        //show($data);
        return $data;
    }


    private function getReadyOrderDetails($order,$branch)
    {
        $data = $order->findAllReadyOrders($branch);
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
        $data = $user->findUsersByRole($branch,'deliverer');
 
        return $data;
 
     }

    
     private function  getDispatchOrderDetails($order,$branch)
     {

        $data = $order->findAllDispatchOrders($branch);
        return $data;
 
     }
}
