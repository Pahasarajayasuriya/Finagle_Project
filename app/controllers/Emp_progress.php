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

       
        $detail = $this->getPlacedOrderDetails();
        $data['detail'] = $detail;


        $ready = $this->getReadyOrderDetails();
        //show($detail);
        $data['ready'] = $ready;
        

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["cancel"])) {

            unset($_POST["cancel"]);
            $this->update_delivered_order($_POST);
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["clear-msg"])) {

            unset($_POST["clear-msg"]);
            $this->update_delivered_order($_POST);
        }



        $driver_details= $this->getDriverDetails($branch);
        //show($driver_details);
        $data['driver_details'] = $driver_details;
        // show($data);

        $dispatch= $this->getDispatchOrderDetails();
        //show($detail);
        $data['dispatch'] = $dispatch;

        $notify = $this ->getNoficiations($branch);
        $data['notify'] = $notify;



        $this->view('employee/order_assign', $data);
    }


    private function update_delivered_order($arr)
    {
        $checkout = new CheckoutOrder();

        $id = $arr['id'];
        $checkout->updateOrder($id, $arr);

        unset($arr['id']);
        // show($arr);

        redirect("Emp_progress");
    }

    


     private function getDriverDetails($branch)
     {

        $user = new User();
        $data = $user->findUsersByRole($branch,'deliverer');
 
        return $data;
 
     }

     private function getNoficiations($branch)
     {
        $checkout = new CheckoutOrder();

        $data = $checkout->findSuccessOrders($branch);
        //show($data);
        return $data;

     }

    

    private function getPlacedOrderDetails()
    {

        $checkout = new CheckoutOrder();

        $data = $checkout->findOrderdetails();
        
        $i = 0;

        // show($data);
        
        foreach ($data as $item) {

            $item->unique_id = $i;

            if ($item->order_status == "order placed") {
                
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


    
    private function getReadyOrderDetails()
    {

        $checkout = new CheckoutOrder();

        $data = $checkout->findOrderdetails();
        
        $i = 0;

        // show($data);
        
        foreach ($data as $item) {

            $item->unique_id = $i;

            if ($item->order_status == "order preparing") {
                
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


    private function getDispatchOrderDetails()
    {

        $checkout = new CheckoutOrder();

        $data = $checkout->findOrderdetails();
        
        $i = 0;

        // show($data);
        
        foreach ($data as $item) {

            $item->unique_id = $i;

            if ($item->order_status == "order dispatch") {
                
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


