<?php

class Admin_products extends Controller
{
    public function index()
    {
        $adminProductsModel = new Admin_productsModel();
        $data['rows'] = $adminProductsModel->all();
        $data['errors'] = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate and sanitize input data
            $validatedData = $adminProductsModel->validate($_POST);

            if ($validatedData) {
                // Handle file upload for the image
                $imagePath = $this->uploadImage($_FILES['image']);

                if ($imagePath) {
                    $validatedData['image'] = $imagePath;

                    // Insert the product into the database
                    $adminProductsModel->insert($validatedData);

                    // Redirect to avoid form resubmission
                    redirect('admin_products');
                } else {
                    // Handle image upload failure
                    echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $adminProductsModel->errors;
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

        // Example code (modify as per your image upload logic)
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($file["name"]);

        // Ensure the target directory exists
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            return false;
        }
    }
}
