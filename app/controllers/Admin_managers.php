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
            //show($data['errors']);
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