<?php

class manager_report extends Controller
{
    public function index()
    {

        $data['errors'] = [];
        $manager_report_model = new manager_reportModel();
        $complaint_model = new ComplaintModel();
        $num_complaints = $complaint_model->countComplaints();
        $summary_data = $manager_report_model->get_summary_data();
        $data = array_merge($data, $summary_data);
        $data['num_complaints'] = $num_complaints;
        $data['rows'] = $manager_report_model->get_all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->view('manager/manager_report2', $data);
        }

        $data['title'] = "manager_report";
        $this->view('manager/manager_report', $data);
    }
}
