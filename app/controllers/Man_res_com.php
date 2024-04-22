
<?php

class Man_res_com extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();


        $this->view('manager/response_complains');
    }

}
