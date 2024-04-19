<?php

class Deliverer_profile extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $driver_id = 7;


        $driverData= $this->getDelivererInfo($driver_id);
       // show($driverData);
        $data['driver_data'] = $driverData;

        $deliveredOrders = $this->getOrdersCount($driver_id );
        //show( $deliveredOrders );
        $data['$deliveredOrder']= $deliveredOrders;

        $totalEarnings = $this->getTotalEarnings($driver_id );
        //show( $totalEarnings);
        $data['$totalEarnings']= $totalEarnings;

       
        $this->view('deliverer/driver_profile', $data);
    }



    private function getDelivererInfo($driver_id){
       $driver = new User();
     
       $data = $driver->findDrivers( $driver_id);

       return $data;
       

    }

    private function getOrdersCount($driver_id )
    {
        $order = new CheckoutOrder();

        $data = $order->find_driver_deliveredOrders($driver_id);

        return $data;
    }
    
    private function getTotalEarnings($driver_id )
    {
        $order = new CheckoutOrder();

        $data = $order->find_total_earnings($driver_id);
       
        return $data;
    }

    
}
