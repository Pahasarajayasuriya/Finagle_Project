<?php

class Admin_employees extends Controller
{
    public function index()
    {

        $admin_employee_model = new admin_employeesModel();
        $data['rows'] = $admin_employee_model->get_all();
        //show($data);
        $data['errors'] = [];
        //show($_POST);
        // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
        //     // Validate and sanitize input data
        //     $validatedData = $admin_employee_model->validate($_POST);

        //     //show($validatedData);
        //     if ($validatedData) {
        //             //show($_POST);
        //             // Insert the product into the database
        //             $admin_employee_model->insert($_POST);

        //             // Redirect to avoid form resubmission
        //             redirect('admin_employees');
        //         } else {
        //             // Handle image upload failure

        //             //echo "Image Upload Failed.";
        //         }
        //     } else {
        //         // Handle validation errors
        //         $data['errors'] = $admin_employee_model->errors;

        //     // }
        // }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Validate and sanitize input data
            $validatedData = $admin_employee_model->validate($_POST);
            //show($data);
            //show($validatedData);
            $id=$_POST['id'];
            if ($validatedData) {
                    //show($_POST);
                    $id=$_POST['id'];
                    unset($_POST['id']);
                    unset($_POST['update']);
                    //show($_POST);
                    // UPdate the DB
                    $admin_employee_model->update($id,$_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_employees');
            } else {
                // Handle validation errors
                $data['errors'] = $admin_employee_model->errors;
            }
        }

        if (!empty($data['errors'])){
            $param['id']=$id;
            $data['row']=$admin_employee_model->where($param);
            //$data['errors']['teleno']="hello";
            //show($data['errors']);
            $this->view('admin/admin_employees_update',$data);
        }

        else{
            
            // ######## Pagination #########
            $limit = 4; // Number of records per page
            if (isset($_GET["page"])) {
                $page  = $_GET["page"];
            } else {
                $page=1;
            }

            $start_from = ($page-1) * $limit;

            $result=$admin_employee_model->pagination($start_from,$limit);

            $rs_result = $admin_employee_model->get_count();
            if (is_array($rs_result) && isset($rs_result[0]->{'COUNT(id)'})) {
                $total_records = $rs_result[0]->{'COUNT(id)'};
                $total_pages = ceil($total_records / $limit);
            } else {
                // Handle case where the count value is not found or the result is not as expected
                // For example:
                $total_records = 0; // Set default value for total records
                $total_pages = 0; // Set default value for total pages
                // Log an error message
                error_log("Error: Count value not found or unexpected result.");
                // You can also display an error message to the user or take other appropriate actions
            }

            $data['rows'] = $result;

            $pagination = "";
            for ($i=1; $i<=$total_pages; $i++) {
                $pagination .= "<a href='http://localhost/finagle/public/admin_employees?page=".$i."'>".$i."</a> ";
            }

            $data['pagination']="<<   ".$pagination."   >>";

            $data['title'] = "admin_employee";
            $this->view('admin/admin_employees', $data);
        }

    }

    public function delete_employee($id)
    {
        $admin_employee_model = new admin_employeesModel();
        $admin_employee_model->del_employee($id);
        redirect('admin_employees');
    }

    public function update_employee($id)
    {
        $param['id']=$id;
        $admin_employee_model = new admin_employeesModel();
        $data['rows'] = $admin_employee_model->get_all();
        // show($data) row is an array;
        $data['row']=$admin_employee_model->where($param);
        $data['errors'] = [];
        $this->view('admin/admin_employees_update',$data);

    }
}