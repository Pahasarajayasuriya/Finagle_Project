<?php

class Emp_productStock extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $branch="Borella";

        $user = new User();
        $data['row'] = $user->first(['id' => $id]);
        $data['title'] = "ProductStock";

        $product = $this->editProducts($branch);
        // show($product);
        $data['product'] = $product;


        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update']) && $_POST['update'] === 'update') {
            unset($_POST['update']);

            $this->updateProducts($_POST);
        }

        $this->view('employee/product_stock', $data);
    }

    private function editProducts($branch)
    {
        $product = new ProductsData();

        $data = $product->findAllProducts($branch);


        foreach ($data as $key) {
            unset($key->description);
            unset($key->price);
            unset($key->date);
            unset($key->slug);
        }

        // show($data);
        return ($data);
    }

    private function updateProducts($arr)
    {
        // added all product id and qty
        $newArr = array();
        $product = new ProductsData();


        foreach ($arr as $key => $value) {
            // Extract numerical part of the key
            $idQtyIndex = preg_replace('/[^0-9]/', '', $key);

            // Determine if it's 'id' or 'qty'
            $type = (strpos($key, 'id') === 0) ? 'id' : 'qty';

            // Add to the two-dimensional array
            $newArr[$idQtyIndex][$type] = $value;
        }


        foreach ($newArr as $key => $data) {
            $qty['quantity'] = $data['qty'];
            $product->update($data['id'], $qty);
        }
        redirect('Emp_productStock');
    }
}
