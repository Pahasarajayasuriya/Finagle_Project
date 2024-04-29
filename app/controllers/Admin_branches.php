<?php

class Admin_branches extends Controller
{
    public function index()
    {

        $admin_branch_model = new admin_branchesModel();
        $data['rows'] = $admin_branch_model->get_all();
        //show($data);
        $data['errors'] = [];
        //show($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            // Validate and sanitize input data
            $validatedData = $admin_branch_model->validate($_POST);

            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    // Insert the product into the database
                    $admin_branch_model->insert($_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_branches');
            }else {
                // Handle validation errors
                $data['errors'] = $admin_branch_model->errors;

            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Validate and sanitize input data
            $validatedData = $admin_branch_model->validate($_POST);
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
                    $admin_branch_model->update($id,$_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_branches');
                 
            } else {
                // Handle validation errors
                $data['errors'] = $admin_branch_model->errors;

            }
        }

        if (!empty($data['errors'])){
            $param['id']=$id;
            $data['row']=$admin_branch_model->where($param);
            //$data['errors']['teleno']="hello";
            //show($data['errors']);
            $this->view('admin/admin_branches_update',$data);
        }

        else{

            // ######## Pagination #########
            $limit =3; // Number of records per page
            if (isset($_GET["page"])) {
                $page  = $_GET["page"];
            } else {
                $page=1;
            }

            $start_from = ($page-1) * $limit;

            $result=$admin_branch_model->pagination($start_from,$limit);

            $rs_result = $admin_branch_model->get_count_p();
            if (is_array($rs_result) && isset($rs_result[0]->{'COUNT(name)'})) {
                $total_records = $rs_result[0]->{'COUNT(name)'};
                $total_pages = ceil($total_records / $limit);
                //show($rs_result);
            } else {
                // Handle case where the count value is not found or the result is not as expected
                $total_records = 0; // Set default value for total records
                $total_pages = 0; // Set default value for total pages
                // Log an error message
                error_log("Error: Count value not found or unexpected result.");
            }

            $data['rows'] = $result;

            $pagination = "";
            for ($i=1; $i<=$total_pages; $i++) {
                $pagination .= "<a href='http://localhost/finagle/public/admin_branches?page=".$i."'>".$i."</a> ";
            }

            $data['pagination']="<<   ".$pagination."   >>";

            $data['title'] = "admin_branch";
            $this->view('admin/admin_branches', $data);
        };

    }

    public function delete_branch($name)
    {
        $admin_branch_model = new admin_branchesModel();
        $admin_branch_model->del_branch($name);
        redirect('admin_branches');
    }

    public function update_branch($id)
    {
        $param['id']=$id;
        $admin_branch_model = new admin_branchesModel();
        $data['rows'] = $admin_branch_model->get_all();
        // show($data) row is an array;
        $data['row']=$admin_branch_model->where($param);
        $data['errors'] = [];
        $this->view('admin/admin_branches_update',$data);

    }
}