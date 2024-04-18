<?php

class OrderDetail_Popup extends Controller
{
    public function index($id=null)
    {
        $id = $id ?? Auth::getId();

        $data['title'] = "";
        // show($_POST);

        $details = new OrderItems();
        $data= $details->where_withInner($_POST,"products","product_id","id");

        // show($data);

        echo json_encode($data);

    }

}

