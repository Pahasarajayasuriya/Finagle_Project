<?php 

/**
 * signup class
 */
class AddEmployee extends Controller
{
	
	public function index()
	{
	
		$data['errors'] = [];

		$user = new User();

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
            show($_POST);
            $_POST['repassword'] =  $_POST['password'];

			if($user->validate($_POST))
			{
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$user->insert($_POST);
			
				message("Your profile was successfuly created. Please login");
				// redirect('login');
			}
            else
            {
                // show("kes");
                show($user->errors);
            }
		}

		$data['errors'] = $user->errors;
		$data['title'] = "Add User";
        $this->view('admin/admin_add_employees',$data);
	}
	
}

       

