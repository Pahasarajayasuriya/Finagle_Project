
<?php

class Manager_view_pro extends Controller
{
    public function index()
    {
        //$id = $id ?? Auth::getId();

        $productModel = new Products();
        $data['rows'] = $productModel->all();





        $this->view('manager/manager_view_pro', $data);
    }

}
