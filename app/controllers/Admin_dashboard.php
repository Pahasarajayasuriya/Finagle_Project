<?php

class Admin_dashboard extends Controller
{
    public function index()
    {

        $admin_product_model = new admin_productsModel();
        $admin_branch_model = new admin_branchesModel();
        $admin_customer_model = new admin_customersModel();
        $admin_deliverer_model = new admin_deliverersModel();

        $CheckoutModel = new CheckoutModel();
        $productModel = new ProductModel();
        $topSellingProducts = $productModel->getTopSellingProducts();
        $totalOrders = $CheckoutModel->getOrderCountByOutlet();

        $data['topSellingProducts'] = $topSellingProducts;
        $data['totalOrders'] = $totalOrders;
        $data['counts']['product_count'] = $admin_product_model->get_count();
        $data['counts']['branch_count'] = $admin_branch_model->get_count();
        $data['counts']['customer_count'] = $admin_customer_model->get_count();
        $data['counts']['deliverer_count'] = $admin_deliverer_model->get_count();

        //show($data);
        $data['title'] = "admin_dashboard";
        $this->view('admin/admin_dashboard', $data);
    }
}
