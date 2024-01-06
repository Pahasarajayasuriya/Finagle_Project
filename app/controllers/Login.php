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
					// unset the password unset($row->password)
					Auth::authenticate($row);

					redirect('home');
				}
			}

			$data['errors']['email'] = "Wrong email or password";
		}

		$this->view('login',$data);
	}
	
}