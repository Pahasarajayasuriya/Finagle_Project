<?php

class Manager_branches extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $branch = new Branches();
        $data= $this->getBranchdata($branch);

        // show($data);
        
        $data["branch"]= $data;
        // show($newData);

        $this->view('manager/branches', $data);
    }

    // public function profile($id = null)
    // {
        
    //     $id = $id ?? Auth::getId();

    //     $user = new User();
    //     $data['row'] = $user->first(['id'=>$id]);
        

    //     $data['title'] = "Profile";
    //     $this->view('customer/cus_profile', $data);
    // }

    private function getBranchdata($branch){
        $data = $branch->findAll();

    //    $data = $branch_id->where($arr);

       return $data;

    }
}
