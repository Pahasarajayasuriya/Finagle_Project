<?php

class Cus_edit_profile extends Controller
{
    // public function index()
    // {
    //     $data['title'] = "Edit Profile";
    //     $this->view('customer/cus_edit_profile', $data);
    // }

    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        $data['title'] = "Edit Profile";
        $this->view('customer/cus_edit_profile', $data);
    }
}

