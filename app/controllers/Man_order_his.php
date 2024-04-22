
<?php

class Man_order_his extends Controller
{
    public function index()
    {
        $checkout = new CheckoutModel();
        $data['rows'] = $checkout->getDetailsFromBorella();
        $this->view('manager/man_order_his',$data);
    }

}
