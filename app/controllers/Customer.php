<?php

// class Customer extends Controller
// {
//     public function index()
//     {
//         $data['title'] = "Home";
//         $this->view('customer/home', $data);
//     }

//     public function complaint()
//     {
//         $data['errors'] = [];
      
//         $complaintModel = new ComplaintModel();
//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             $validatedData = $complaintModel->validate($_POST);

//             if ($validatedData) {
//                 $complaintModel->insert($validatedData);

//                 $successMessage = urlencode("Complaint submitted successfully!");

//                 redirect("complaint?success=$successMessage");
//             }
//         }

//         if (!empty($_GET['success'])) {
//             $data['successMessage'] = urldecode($_GET['success']);
//         }
//         $data['errors'] = $complaintModel->errors;
//         $data['title'] = "Complaint";
//         $this->view('customer/complaint', $data);
//     }

//     public function Cus_edit_profile($id = null)
//     {
//         $id = $id ?? Auth::getId();
//         $data['errors'] = [];
//         $user = new User();
//         $data['row'] = $row = $user->first(['id' => $id]);

//         if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
//             $newPassword = $_POST['newpassword'] ?? '';
//             $confirmPassword = $_POST['renewpassword'] ?? '';

//             if ($user->edit_validate($_POST,$id)) {
//                 if (!empty($newPassword)) {
//                     $currentPassword = $_POST['password'] ?? '';

//                     if (!password_verify($currentPassword, $row->password)) {
//                         echo '<div style="color: #d9534f; background-color: #f2dede; border: 1px solid #ebccd1; padding: 10px; margin: 10px 0; border-radius: 4px;">Incorrect current password. Please try again.</div>';
//                         return;
//                     }


//                     if ($newPassword !== $confirmPassword) {
//                         echo '<div style="color: #d9534f; background-color: #f2dede; border: 1px solid #ebccd1; padding: 10px; margin: 10px 0; border-radius: 4px;">New password and confirm password do not match. Please try again.</div>';
//                         return;
//                     }


//                     $_POST['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
//                 } else {
    
//                     unset($_POST['password']);
//                 }
    
//                 $user->update($id, $_POST);
//                 redirect('login/' . $id);

//             }    
//         }
//         $data['errors'] = $user->errors;
//         $data['title'] = "Edit Profile";
//         $this->view('customer/cus_edit_profile', $data);
//     }

//     public function Cus_profile($id = null)
//     {
//         $id = $id ?? Auth::getId();

//         $user = new User();
//         $data['row'] = $user->first(['id'=>$id]);
//         $data['title'] = "Profile";
//         $this->view('customer/cus_profile', $data);
//     }

//     public function Products()
//     {
//         $productModel = new ProductModel();
//         $data['products'] = $productModel->all();
//         $data['title'] = "Products";
//         $this->view('customer/products', $data);
//     }

//     public function Recipes()
//     {
//         $data['title'] = "Recipes";
//         $this->view('customer/recipes', $data);
//     }
// }
