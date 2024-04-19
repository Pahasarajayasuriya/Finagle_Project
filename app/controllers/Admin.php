<?php 


// class Admin extends Controller
// {
	
// 	public function index()
// 	{
	
// 		$data['errors'] = [];

// 		$user = new User();

// 		if($_SERVER['REQUEST_METHOD'] == "POST")
// 		{
//             $_POST['repassword'] =  $_POST['password'];

// 			if($user->validate($_POST))
// 			{
// 				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

// 				$user->insert($_POST);
			
// 				message("Your profile was successfuly created. Please login");
// 				redirect('login');
// 			}
// 		}

// 		$data['errors'] = $user->errors;
// 		$data['title'] = "Add User";
//         $this->view('admin/admin_add_employees',$data);
// 	}

//     public function addproducts()

//     {
//         $adminProductsModel = new Admin_productsModel();

//         $data['rows'] = $adminProductsModel->all(); 
//         $data['errors'] = [];

//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             $validatedData = $adminProductsModel->validate($_POST);

//             if ($validatedData) {
//                 $imagePath = $this->uploadImage($_FILES['image']);
//                 if ($imagePath) {
//                     $validatedData['image'] = $imagePath;

//                     $adminProductsModel->insert($validatedData);

//                     redirect('admin_products');
//                 } else {

//                     echo "Image Upload Failed.";
//                 }
//             } else {
//                 $data['errors'] = $adminProductsModel->errors;

//             }
//         }

//         $data['title'] = "Products";
//         $this->view('admin/admin_products', $data);
//     }


//     private function uploadImage($file)
//     {

//         $targetDirectory = "uploads/";
//         $targetFile = $targetDirectory . basename($file["name"]);

//         if (!is_dir($targetDirectory)) {
//             mkdir($targetDirectory, 0777, true);
//         }

//         $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
//         $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//         if (!in_array($fileExtension, $allowedExtensions)) {
//             echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
//             return false;
//         }

//         list($width, $height) = getimagesize($file["tmp_name"]);
//         $maxDimension = 20000;

//         if ($width > $maxDimension || $height > $maxDimension) {
//             echo "Image dimensions are too high. Please upload a smaller image.";
//             return false;
//         }

//         if (move_uploaded_file($file["tmp_name"], $targetFile)) {
//             return $targetFile;
//         } else {
//             echo "Image Upload Failed.";
//             return false;
//         }
	
// }
// }

       


