<?php

class Deliverer_assign extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $data['title'] = "Assign";

        $readyOrder = $this->delivery_order();
        $data['ready_order'] = $readyOrder;

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["delivered_btn"])) {
            unset($_POST["delivered_btn"]);
            
            $this->update_delivered_order($_POST);
        }

        // echo $_SESSION;
        $this->view('deliverer/driver_assign', $data);
    }

    private function update_delivered_order($arr)
    {
        $checkout = new CheckoutOrder();

        $id = $arr['id'];
        unset($arr['id']);
        // show($arr);
        $checkout->update($id,$arr);
        redirect("Deliverer_assign");
    }
    private function delivery_order()
    {
        $checkout = new CheckoutOrder();
        $completeOrder = $checkout->findAll();

        $completeOrderOnly=array();

        foreach ($completeOrder as $key => $data) {

            // need to find register driver for this orders. It is not added
            if ($data->delivery_or_pickup == "delivery" && $data->order_status == "Ready") {
                unset($data->order_status);
                unset($data->delivery_date);
                unset($data->delivery_time);
                unset($data->total_cost);
                unset($data->is_gift);
                unset($data->payment_method);
                unset($data->note);
                unset($data->formatted_address);
                unset($data->delivery_or_pickup);
                unset($data->deliver_id);
                
                $completeOrderOnly[$key] = $data;
            }
        }

        return $completeOrderOnly;
    }
}
