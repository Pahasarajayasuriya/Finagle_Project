<?php

class Man_complains extends Controller
{
    public function index()
    {
        $complaint = new ComplaintModel;
        $data['rows'] = $complaint->all();

        // Pass $data array to the view
        $this->view('manager/man_complains', $data);
    }
}









 