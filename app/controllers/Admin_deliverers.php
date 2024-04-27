<?php

class Admin_deliverers extends Controller
{
    public function index()
    {

        $admin_deliverer_model = new admin_deliverersModel();
        $data['rows'] = $admin_deliverer_model->get_all();
        //show($data);
        $data['errors'] = [];
        //show($_POST);
        // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
        //     // Validate and sanitize input data
        //     $validatedData = $admin_deliverer_model->validate($_POST);

        //     //show($validatedData);
        //     if ($validatedData) {
        //             //show($_POST);
        //             // Insert the product into the database
        //             $admin_deliverer_model->insert($_POST);

        //             // Redirect to avoid form resubmission
        //             redirect('admin_deliverers');
        //         } else {
        //             // Handle image upload failure

        //             //echo "Image Upload Failed.";
        //         }
        //     } else {
        //         // Handle validation errors
        //         $data['errors'] = $admin_deliverer_model->errors;

        //     // }
        // }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Validate and sanitize input data
            $validatedData = $admin_deliverer_model->validate($_POST);
            //show($data);
            //show($validatedData);
            $id=$_POST['id'];
            if ($validatedData) {
                    //show($_POST);
                    $id=$_POST['id'];
                    unset($_POST['id']);
                    unset($_POST['update']);
                    show($_POST);
                    // UPdate the DB
                    $admin_deliverer_model->update($id,$_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_deliverers');
            } else {
                // Handle validation errors
                $data['errors'] = $admin_deliverer_model->errors;

            }
        }

        if (!empty($data['errors'])){
            $param['id']=$id;
            $data['row']=$admin_deliverer_model->where($param);
            //$data['errors']['teleno']="hello";
            //show($data['errors']);
            $this->view('admin/admin_deliverers_update',$data);
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

            $result=$admin_deliverer_model->pagination($start_from,$limit);

            $rs_result = $admin_deliverer_model->get_count_p();
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
                $pagination .= "<a href='http://localhost/finagle/public/admin_deliverers?page=".$i."'>".$i."</a> ";
            }

            $data['pagination']="<<   ".$pagination."   >>";

            $data['title'] = "admin_deliverer";
            $this->view('admin/admin_deliverers', $data);
        }

    }

    public function delete_deliverer($id)
    {
        $admin_deliverer_model = new admin_deliverersModel();
        $admin_deliverer_model->del_deliverer($id);
        redirect('admin_deliverers');
    }

    public function update_deliverer($id)
    {
        $param['id']=$id;
        $admin_deliverer_model = new admin_deliverersModel();
        $data['rows'] = $admin_deliverer_model->get_all();
        // show($data) row is an array;
        $data['row']=$admin_deliverer_model->where($param);
        $data['errors'] = [];
        $this->view('admin/admin_deliverers_update',$data);

    }
}