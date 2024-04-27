<?php
class Manager_employee extends Controller
{
    public function index()
    {
        $employeeModel = new Employee();
        $data['employee'] = $employeeModel->getEmployees();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Retrieve form data from $_POST
            $formData = [
               
                'orders' => $_POST['orders'],
                'customers' => $_POST['customers'],
                'revenues' => $_POST['revenues'],
                'others' => $_POST['others']
            ];

            // Instantiate Goals model
            $goal = new Goals();

            // Insert data into the goals table
            if ($goal->insert($formData)) {
                redirect('Manager_employee');
            } else {
                // Handle insertion failure
                // You might want to add error handling here
            }
        }

        $data['title'] = "Manager_employee";

        $this->view('manager/manager_employee', $data);
    }
}

?>