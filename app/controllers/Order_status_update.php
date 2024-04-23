<?php

class Order_status_update extends Controller
{

        public function index()
        {

                $checkout_order = new CheckoutOrder();
                // authenticate request user is employee or not
                // if(){

                // }

                if (!empty($_POST['id_array'])) {

                        $arr['order_status'] = $_POST['status'];

                        foreach ($_POST['id_array'] as $id) {

                                // $arr['id'] = $id; 
                                $checkout_order->update($id, $arr);
                        }

                        echo json_encode(['update' => true]);
                } else {

                        echo json_encode(['update' => false]);
                }

                // order_status

        }
}
