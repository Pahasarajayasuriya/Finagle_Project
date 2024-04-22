<?php
class Manager_employee extends Controller
{
    public function index()
    {
        $employeeModel = new Employee();
        $data['employee'] = $employeeModel->getEmployees();

        $this->view('manager/manager_employee', $data);
    }
}
?>