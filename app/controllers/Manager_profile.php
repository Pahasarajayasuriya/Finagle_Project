
<?php

class Manager_profile extends Controller
{
    public function index()
    {
        //$id = $id ?? Auth::getId();
        $user = new User;
        $data['rows'] = $user->getManagersBorella();

        $this->view('manager/manager_profile', $data);
    }
}
