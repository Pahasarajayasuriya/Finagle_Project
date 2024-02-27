<?php

class Emp_dashboard extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $order = new Orders();
        $data = $this->getOrderdata($order);
        // show($data);
        $data['order'] = $data;




        $this->view('employee/employee_dashboard', $data);
     

    }

    // public function profile($id = null)
    // {

    //     $id = $id ?? Auth::getId();

    //     $user = new User();
    //     $data['row'] = $user->first(['id'=>$id]);


    //     $data['title'] = "Profile";
    //     $this->view('customer/cus_profile', $data);
    // }

    private function getOrderdata($order)
    {
        $data = $order->findAll('order_id','DESC',3);

        //    $data = $branch_id->where($arr);
        // show($data);
        return $data;
    }

   
}
