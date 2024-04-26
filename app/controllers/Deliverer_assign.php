<?php

class Deliverer_assign extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $data['title'] = "Assign";

        $readyOrder = $this->getItemsDetails();
        //show($readyOrder);
        $data['ready_order'] = $readyOrder;

        
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["payment-btn"])) {

            unset($_POST["payment-btn"]);
            $this->update_delivered_order($_POST);
        }


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
        $checkout->updateOrder($id, $arr);

        unset($arr['id']);
        // show($arr);

        redirect("Deliverer_assign");
    }

   

    private function getItemsDetails()
    {

        $checkout = new CheckoutOrder();

        $data = $checkout->findOrderdetails();
        
        $i = 0;

        // show($data);
        
        foreach ($data as $item) {

            $item->unique_id = $i;

            if ($item->delivery_or_pickup == "delivery" && $item->order_status == "order dispatch") {
                
                // initially included data pass to the array
                $item->mult_order = [
                    [
                        "user_name" => $item->user_name,
                        "quantity" => $item->quantity,
                        "price"=> $item->price
                    ]
                    ];
                }else{
                    unset($data[$i]);
                }
                $i++;
            }
            
        //show($data);        
        // find the same order id orders and merge that orders 
        foreach ($data as $nkey =>$item) {
            

            foreach ($data as $key=> $value) {

                if ($item->unique_id != $value->unique_id && $item->id == $value->id) {

                    $new_mult = [

                        "user_name" => $value->user_name,
                        "quantity" => $value->quantity,
                        "price"=> $value->price
                    ];

                    $item->mult_order = array_merge($item->mult_order, [$new_mult]);

                }
                
            }
            
        }

        $new_result = [];
        $id_array = [];

        // show($data);


        foreach($data as $item) {

            if (!in_array( $item->id,$id_array)) {

                array_push($id_array, $item->id);
                array_push($new_result, $item);
            }

            unset($item->user_name);
            
            unset($item->quantity);

            unset($item->price);



        }

        //show($new_result);

        return($new_result);

        
    }
}
