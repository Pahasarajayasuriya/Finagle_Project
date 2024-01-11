<?php

class Manager_deliverer extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $driver = new Deliverers ();
        $data= $this->getDelivererdata($driver);

        // show($data);
        
        $data["driver"]= $data;
        // show($newData);

        $this->view('manager/deliverers', $data);
    }

    // public function profile($id = null)
    // {
        
    //     $id = $id ?? Auth::getId();

    //     $user = new User();
    //     $data['row'] = $user->first(['id'=>$id]);
        

    //     $data['title'] = "Profile";
    //     $this->view('customer/cus_profile', $data);
    // }

    private function getDelivererdata($driver){
        $data = $driver->findAll();

       return $data;

    }
}
