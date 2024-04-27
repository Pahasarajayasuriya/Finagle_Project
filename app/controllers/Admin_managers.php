<?php

class Admin_managers extends Controller
{
    public function index()
    {

        $admin_manager_model = new admin_managersModel();
        $data['rows'] = $admin_manager_model->get_all();
        //show($data);
        $data['errors'] = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Validate and sanitize input data
            $validatedData = $admin_manager_model->validate($_POST);
            
            $id=$_POST['id'];
            //show($data['errors']);
            if ($validatedData) {
                   //show($_POST);
                    $id=$_POST['id'];
                    unset($_POST['id']);
                    unset($_POST['update']);
                    //show($_POST);
                    // UPdate the DB
                    $admin_manager_model->update($id,$_POST);

                    // Redirect to avoid form resubmission
                    //$data['errors'] = [];
                    redirect('admin_managers');
            }
            else {
                // Handle validation errors
                $data['errors'] = $admin_manager_model->errors;
                //redirect('admin_managers');
                //$this->update_manager($id);
            }           
        }

        if (!empty($data['errors'])){
            $param['id']=$id;
            $data['row']=$admin_manager_model->where($param);
            //$data['errors']['teleno']="hello";
            //show($data['errors']);
            $this->view('admin/admin_managers_update',$data);
        }

        else{
            // ######## Pagination #########
            $limit = 2; // Number of records per page
            if (isset($_GET["page"])) {
                $page  = $_GET["page"];
            } else {
                $page=1;
            }

            $start_from = ($page-1) * $limit;

            // $sql = "SELECT * FROM test LIMIT $start_from, $limit";
            // $result = $conn->query($sql);
            $result=$admin_manager_model->pagination($start_from,$limit);
            //show($result);

            // Pagination links
            //$sql = "SELECT COUNT(id) FROM test";
            // $rs_result = $admin_manager_model->get_count();
            // $row = $rs_result->fetch_row();
            // $total_records = $row[0];
            // $total_pages = ceil($total_records / $limit);
            //$total_pages=2;

            $rs_result = $admin_manager_model->get_count();
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
                $pagination .= "<a href='http://localhost/finagle/public/admin_managers?page=".$i."'>".$i."</a> ";
            }

            $data['pagination']="<<   ".$pagination."   >>";

            $data['title'] = "admin_manager";
            $this->view('admin/admin_managers', $data);
        }

        //show($data['errors'])
        //$this->view('admin/admin_managers', $data);

    }

    public function delete_manager($id)
    {
        $admin_manager_model = new admin_managersModel();
        $admin_manager_model->del_manager($id);
        redirect('admin_managers');
    }

    public function update_manager($id)
    {
        $param['id']=$id;
        $admin_manager_model = new admin_managersModel();
        $data['rows'] = $admin_manager_model->get_all();
        // show($data) row is an array;
        $data['row']=$admin_manager_model->where($param);
        $data['errors'] = [];
        $this->view('admin/admin_managers_update',$data);

    }
}