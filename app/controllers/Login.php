<?php 

/**
 * login class
 */
class Login extends Controller
{
	
	public function index()
	{

		$data['errors'] = [];

		$data['title'] = "Login";
		$user = new User();

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//validate
			$row = $user->first([
				'email'=>$_POST['email']
			]);

            // show($row);
            // show($_POST);


			if($row){
                show(password_verify($_POST['password'],$row->password));

				if(password_verify($_POST['password'], $row->password))
				{
					//authenticate
					Auth::authenticate($row);

					// redirect('home');
					if(Auth::is_admin()){
						redirect("Admin_products");
					}
					else if(Auth::is_customer()){
						redirect("home");
					}
					else if(Auth::is_employee()){
						redirect("emp_profile");
					}
					else if(Auth::is_manager()){
						redirect("manager_profile");
					}
					else if(Auth::is_deliverer()){
						redirect("deliverer_profile");
					}
					else
					{
						redirect("login");
					}
				}
			}

			$data['errors']['email'] = "Wrong email or password";
		}

		$this->view('login',$data);
	}
	
}