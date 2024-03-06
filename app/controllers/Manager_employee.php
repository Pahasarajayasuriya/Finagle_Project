
<?php

class Manager_employee extends Controller
{
    public function index()
    {
        //$id = $id ?? Auth::getId();

        $employee = new Employee;
        $data['rows'] = $employee->all();

        // Pass $data array to the view


        $this->view('manager/manager_employee', $data);
    }

}
