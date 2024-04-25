<?php 


class AddEmployee extends Controller
{

	public function index()
	{
	
		$data['errors'] = [];

		$user = new User();
		$CheckoutModel = new CheckoutModel();
        // Fetch all branches
        $branches = $CheckoutModel->getAllBranches();

        // Pass branches to the view
        $data['branches'] = $branches;


		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
            $_POST['repassword'] =  $_POST['password'];

			show($_POST);
			if($user->validate($_POST))
			{
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$user->insert($_POST);
			
				message("Your profile was successfuly created. Please login");
				//redirect('login');
			}
		}

		$data['errors'] = $user->errors;
		$data['title'] = "Add User";
        $this->view('admin/admin_add_employees',$data);
	}
	
}

       

