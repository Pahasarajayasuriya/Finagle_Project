<?php

/**
 * signup class
 */
class Signup extends Controller
{

	public function index()
	{

		$data['errors'] = [];

		$user = new User();

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			if ($user->validate($_POST)) {
				$_POST['role'] = 'customer';
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$user->insert($_POST);
				$successMessage = '<div style="color: #008000;">Your profile was successfully created!</div>';
				message("$successMessage");
				redirect('login');
			}
		}

		$data['errors'] = $user->errors;
		$data['title'] = "Signup";

		$this->view('signup', $data);
	}
}
