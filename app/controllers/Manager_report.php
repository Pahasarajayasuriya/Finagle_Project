<?php

class manager_report extends Controller
{
    public function index()
    {

        //show($data);
        $data['errors'] = [];
        $manager_report_model = new manager_reportModel();
        $data['rows'] = $manager_report_model->get_all();
        // $data['rows1'] = $manager_report_model->get_all2();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->view('manager/manager_report2', $data);
        }

        $data['title'] = "manager_report";
        // $this->view('manager/manager_report', $data);
        $this->view('manager/manager_report', $data);

    }    
}