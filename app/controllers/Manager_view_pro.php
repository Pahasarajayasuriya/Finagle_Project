
<?php

class Manager_view_pro extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();


        $this->view('manager/view_products');
    }

}
