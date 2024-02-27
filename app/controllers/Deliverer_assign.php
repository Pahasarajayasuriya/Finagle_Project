<?php

class Deliverer_assign extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $data['title'] = "Assign";
        $this->view('deliverer/driver_assign', $data);
    }
}
