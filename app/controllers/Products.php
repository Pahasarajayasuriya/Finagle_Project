<?php

// class Products extends Controller
// {
//     public function index()
//     {
//         $productModel = new ProductModel();
//         $DB = new Database();
//         $ROWS = false;
//         $data['products'] = $productModel->all();
//         $prod_id = array();
//         if (isset($_SESSION['CART'])) {
//             $prod_id = array_column($_SESSION['CART'], 'id');
//             $ids_str = "'" . implode("','", $prod_id) . "'";

//             $ROWS = $DB->read("SELECT * FROM products WHERE id IN ($ids_str)");
//         }

//         if (is_array($ROWS)) {
//             foreach ($ROWS as $key => $row) {
//                 foreach ($_SESSION['CART'] as $item) {
//                     if ($row['id'] == $item['id']) {
//                         $ROWS[$key]['cart_qty'] = $item['qty'];
//                         break;
//                     }
//                 }
//             }
//         }

//         $data['ROWS'] = $ROWS;
//         $data['title'] = "Products";
//         $this->view('customer/products', $data);
//     }
// }


class Products extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->all();

        // var_dump($data['products']);

        $data['title'] = "Products";
        $this->view('customer/products', $data);
    }
}