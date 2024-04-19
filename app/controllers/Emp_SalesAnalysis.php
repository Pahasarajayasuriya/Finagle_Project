<?php

class Emp_SalesAnalysis extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $online = new Checkout();
        $online_delivery = $this->getOnlineDeliveries($online);
       // $online_delivery['$online'] = $online_delivery;

        $pickup = new Checkout();
        $pickups= $this->getPickupOrders($pickup);
       // $pickups['$pickup'] = $pickups;

        $orders = [
            'online_delivery' => $online_delivery,
            'pickup_orders' => $pickups
        ];

        show($orders);
        $this->view('employee/employee_dashboard',  $orders);

    }

  

    private function getOnlineDeliveries($analyse)
    {
        return $analyse->count_online();
        // $data = $analyse-> count_online();

        // return $data;
    }

    private function getPickupOrders($analyse)
    {
        return $analyse->count_pickup();
        // $data = $analyse-> count_pickup();

        // return $data;

        
    }
}
