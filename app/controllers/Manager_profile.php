
<?php

class Manager_profile extends Controller
{
    public function index()
    {
        //$id = $id ?? Auth::getId();

        $profile = new User;
        $data['rows'] = $profile ->all();


        $this->view('manager/manager_profile', $data);
    }

}
