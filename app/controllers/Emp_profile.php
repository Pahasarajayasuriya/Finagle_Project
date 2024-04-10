<?php

class Emp_profile extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $branch_id = 13;

        $allBranchEmp= $this->getEmpdata($branch_id);
        //show($allBranchEmp);
        $data['data'] = $allBranchEmp;


        $this->view('employee/employee_profile', $data);
    }

    

    private function getEmpdata($branch_id ){
       $user = new User();

       $data = $user->findUsersByRole( $branch_id,'employee');

       return $data;

    }
}
