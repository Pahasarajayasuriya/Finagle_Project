<?php

class Deliverer_profile extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $id = 1;

        $driver = new Deliverers();
        $data['row'] = $driver->first(['id'=>$id]);
        $data['title'] = "Profile";

        $driverData= $this->getDelivererInfo($id);
        // show($driverData);
        $data['data'] = $driverData;
       
        $this->view('deliverer/driver_profile', $data);
    }

   

    // public function getDelivererInfo($id)
    // {

    //     $driver = new Deliverers();

    //     $data = $driver->findAll($id);


    //     foreach ($data as $key) {
    //         unset($key->password);
    //         unset($key->email);
    //         unset($key->contact_number);
    //         unset($key->DOB);
    //     }

       
    //     return ($data);
    // }

    private function getDelivererInfo($driver_id){
        $driver = new Deliverers();

        $arr['id']=$driver_id;

       $data = $driver->where($arr);

       foreach ($data as $key) {
        unset($key->password);
        unset($key->email);
        unset($key->contact_number);
        unset($key->DOB);
      }

       return $data;

    }
    

    
}
