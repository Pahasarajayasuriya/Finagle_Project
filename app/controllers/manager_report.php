<?php

class manager_report extends Controller
{
    public function index()
    {
        $data['errors'] = [];
        $manager_report_model = new manager_reportModel();
        $complaint_model = new ComplaintModel();
        $num_complaints = $complaint_model->countComplaints();

        $start_date = $_POST['start_date'] ?? date('Y-m-d', strtotime('-30 days'));
        $end_date = $_POST['end_date'] ?? date('Y-m-d');
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $summary_data = $manager_report_model->get_summary_data($start_date, $end_date);
        $data = array_merge($data, $summary_data);
        $data['num_complaints'] = $num_complaints;
        $data['rows'] = $manager_report_model->get_all($start_date, $end_date);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->view('manager/manager_report2', $data);
        }

        $data['title'] = "manager_report";
        $this->view('manager/manager_report', $data);
    }
}
