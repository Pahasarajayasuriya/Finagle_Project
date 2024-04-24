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

                        // order delivery assign with updating part
                        if ($_POST['status'] == "order dispatch") {

                                $arr['order_status'] = $_POST['status'];
                                $arr['deliver_id'] = $_POST['deliver_id'];

                                foreach ($_POST['id_array'] as $id) {

                                        // $arr['id'] = $id; 
                                        $checkout_order->update($id, $arr);
                                }
                        }


                        // cancel orders process
                        else if ($_POST['status'] == "order cancelled") {

                                $arr_1['order_status'] = $_POST['status'];

                                $cancel_orders = new CancelOrders;

                                // cancel order for 
                                $arr_2['reason'] = $_POST['reason'];


                                foreach ($_POST['id_array'] as $id) {

                                        // update the checkout table status
                                        $checkout_order->update($id, $arr_1);

                                        $arr_2['order_id'] = $id;
                                        $cancel_orders->insert($arr_2);
                                }
                        }


                        // notification updating method
                        else if ($_POST['status'] == "notification") {

                                
                                unset($_POST['status']);
                                
                                // // only get one id from id_array 
                                $id = $_POST['id_array'];
                                $arr['view_status'] = 1;

                                // echo json_encode($id);

                               $checkout_order->update($id,$arr);
                                
                        }


                        // order ready for updating part
                        else {

                                $arr['order_status'] = $_POST['status'];

                                foreach ($_POST['id_array'] as $id) {

                                        // $arr['id'] = $id; 
                                        $checkout_order->update($id, $arr);
                                }
                        }


                        echo json_encode(['update' => true]);
                } else {

                        echo json_encode(['update' => false]);
                }
        }
}
