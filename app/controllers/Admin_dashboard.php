<?php

class Admin_dashboard extends Controller
{
    public function index()
    {

        $admin_product_model = new admin_productsModel();
        $admin_branch_model = new admin_branchesModel();
        $admin_customer_model = new admin_customersModel();

        $data['counts']['product_count']=$admin_product_model->get_count();
        $data['counts']['branch_count']=$admin_branch_model->get_count();
        $data['counts']['customer_count']=$admin_customer_model->get_count();

        //show($data);
        $data['title'] = "admin_dashboard";
        $this->view('admin/admin_dashboard2', $data);

    }
}