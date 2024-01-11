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



    private function uploadImage($file)
    {

        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($file["name"]);

        // Ensure the target directory exists
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        // Check allowed file types
        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
            return false;
        }

        // Check image dimensions
        list($width, $height) = getimagesize($file["tmp_name"]);
        $maxDimension = 20000;

        if ($width > $maxDimension || $height > $maxDimension) {
            echo "Image dimensions are too high. Please upload a smaller image.";
            return false;
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            echo "Image Upload Failed.";
            return false;
        }

    }
}
