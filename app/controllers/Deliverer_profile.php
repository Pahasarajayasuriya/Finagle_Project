<?php

class Deliverer_profile extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $data['title'] = "Profile";
        $this->view('deliverer/driver_profile', $data);
    }
}
