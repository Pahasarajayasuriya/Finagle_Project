<?php

class Admin_customers extends Controller
{
    public function index()
    {

        $admin_customer_model = new admin_customersModel();
        $data['rows'] = $admin_customer_model->get_all();
        //show($data);
        $data['errors'] = [];
        //show($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            // Validate and sanitize input data
            $validatedData = $admin_customer_model->validate($_POST);

            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    // Insert the product into the database
                    $admin_customer_model->insert($_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_customers');
                } else {
                    // Handle image upload failure

                    //echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_customer_model->errors;

            // }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Validate and sanitize input data
            $validatedData = $admin_customer_model->validate($_POST);
            //show($data);
            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    $id=$_POST['id'];
                    unset($_POST['id']);
                    unset($_POST['update']);
                    show($_POST);
                    // UPdate the DB
                    $admin_customer_model->update($id,$_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_customers');
                } else {
                    // Handle image upload failure

                    echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_customer_model->errors;

            // }
        }

        // ######## Pagination #########
        $limit = 4; // Number of records per page
        if (isset($_GET["page"])) {
            $page  = $_GET["page"];
        } else {
            $page=1;
        }

        $start_from = ($page-1) * $limit;

        $result=$admin_customer_model->pagination($start_from,$limit);

        $rs_result = $admin_customer_model->get_count_p();
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
            $pagination .= "<a href='http://localhost/finagle/public/admin_customers?page=".$i."'>".$i."</a> ";
        }

        $data['pagination']="<<   ".$pagination."   >>";

        $data['title'] = "admin_customer";
        $this->view('admin/admin_customers', $data);

    }

    public function delete_customer($id)
    {
        $admin_customer_model = new admin_customersModel();
        $admin_customer_model->del_customer($id);
        redirect('admin_customers');
    }

    public function update_customer($id)
    {
        $param['id']=$id;
        $admin_customer_model = new admin_customersModel();
        $data['rows'] = $admin_customer_model->get_all();
        // show($data) row is an array;
        $data['row']=$admin_customer_model->where($param);
        $data['errors'] = [];
        $this->view('admin/admin_customers_update',$data);

    }
}