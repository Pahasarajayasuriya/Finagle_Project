<?php

class Admin_products extends Controller
{
    public function index()
    {
        $adminProductsModel = new Admin_productsModel();
        $data['errors'] = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate and sanitize input data
            $validatedData = $adminProductsModel->validate($_POST);

            if ($validatedData) {
                // Handle file upload for the image
                $imagePath = $this->uploadImage($_FILES['image']);
                // if ($imagePath) {
                    // $validatedData['image'] = $imagePath;
                    // show("5");
                    // Insert the product into the database
                    $adminProductsModel->insert($validatedData);

                    // Redirect to avoid form resubmission
                    redirect('admin_products');
                // } else {
                    // show("55");
                    // Handle image upload failure
                    // You can add an error message or redirect to the form page with an error
                // }
            } else {
                // Handle validation errors
                // You can add an error message or redirect to the form page with errors
            }
        }

        $data['title'] = "Products";
        $this->view('admin/admin_products', $data);
    }

    // Function to handle image upload
    private function uploadImage($file)
    {
        // Add your image upload logic here
        // Return the path of the uploaded image if successful, or false on failure
    }
}
