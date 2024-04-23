<?php

class manager_report extends Controller
{
    public function index()
    {

        $data['errors'] = [];
        $manager_report_model = new manager_reportModel();
        $data['rows'] = $manager_report_model->get_all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->view('manager/manager_report2', $data);
        }

        $data['title'] = "manager_report";
        $this->view('manager/manager_report', $data);

    }    
}