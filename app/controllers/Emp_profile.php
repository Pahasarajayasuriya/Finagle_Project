<?php

class Emp_profile extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $branch = 'Borella';

        $allBranchEmp = $this->getEmpdata($branch);
        // show($allBranchEmp);
        $data['emp'] = $allBranchEmp;

        $this->view('employee/employee_profile', $data);
    }



    private function getEmpdata($branch)
    {
        $user = new User();

        $data = $user->findUsersByRole($branch, 'employee');

        return $data;
    }
}
