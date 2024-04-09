<?php

class Emp_profile extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

         //show($id);

        // $_SESSION['USER_DATA']->branch_id;
        
        $branch_id = 13;

        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        $data['title'] = "Profile";

        $allBranchEmp= $this->getEmpdata($branch_id);
        // show($allBranchEmp);
        $data['data'] = $allBranchEmp;

        $this->view('employee/employee_profile', $data);
    }

    

    private function getEmpdata($branch_id){
        $employee = new Employee();

        $arr['branch_id']=$branch_id;

       $data = $employee->where($arr);
       return $data;

    }
}
