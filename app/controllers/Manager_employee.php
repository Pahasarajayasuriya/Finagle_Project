<?php
class Manager_employee extends Controller
{
    public function index()
    {
        $employeeModel = new Employee();
        $data['employee'] = $employeeModel->getEmployees();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $goal = new Goals();

        }

        $this->view('manager/manager_employee', $data);
    }
}
?>