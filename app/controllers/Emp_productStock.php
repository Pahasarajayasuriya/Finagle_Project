<?php

class Emp_productStock extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $user = new User();
        $data['row'] = $user->first(['id' => $id]);
        $data['title'] = "ProductStock";

        $product = $this->editProducts();
        $data['product'] = $product;


        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update']) && $_POST['update'] === 'update') {
            unset($_POST['update']);
            // show($_POST);

            $this->updateProducts($_POST);
        }

        $this->view('employee/product_stock', $data);
    }

    // public function profile($id = null)
    // {

    //     $id = $id ?? Auth::getId();

    //     $user = new User();
    //     $data['row'] = $user->first(['id'=>$id]);


    //     $data['title'] = "Profile";
    //     $this->view('customer/cus_profile', $data);
    // }

    private function editProducts()
    {
        $product = new Products();

        $data = $product->findAll();


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
        $product = new Products();


        foreach ($arr as $key => $value) {
            // Extract numerical part of the key
            $idQtyIndex = preg_replace('/[^0-9]/', '', $key);

            // Determine if it's 'id' or 'qty'
            $type = (strpos($key, 'id') === 0) ? 'id' : 'qty';

            // Add to the two-dimensional array
            $newArr[$idQtyIndex][$type] = $value;
        }

        // show($newArr);

        for ($i = 1; $i <= count($newArr); $i++) {

            $qty['quantity'] = $newArr[$i]['qty'];

            $product->update($newArr[$i]['id'], $qty);
        }
        redirect('Emp_productStock');
        // echo count($newArr);
    }
}
