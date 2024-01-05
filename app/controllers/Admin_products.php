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
                    echo "Image Upload Failed. Details:";
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
        $uploadOk = 1;

        // Check if image file is a actual image or fake image
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            $uploadOk = 0;
        }

        // Check file size
        if ($file["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (!in_array($imageFileType, $allowedExtensions)) {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
        } else {
            // if everything is ok, try to upload file
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                return $targetFile;
            } else {
                return false;
            }
        }
    }
}
