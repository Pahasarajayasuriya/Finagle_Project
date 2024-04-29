<?php

class Admin_products_add extends Controller
{
    public function index()
    {

        $admin_product_model = new admin_productsModel();
        $data['rows'] = $admin_product_model->get_all();
        //show($data);
        $data['errors'] = [];
        //show($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            // Validate and sanitize input data
            $validatedData = $admin_product_model->validate($_POST);

            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    // Insert the product into the database
                $imagePath = $this->uploadImage($_FILES['image']);
                if ($imagePath) {
                    $validatedData['image'] = $imagePath;

                    // Insert the product into the database
                    $admin_product_model->insert($validatedData);

                    redirect('admin_products');
                } else {

                    //redirect('admin_products');
                }
            }else {
                // Handle validation errors
                $data['errors'] = $admin_product_model->errors;

            }
        }

        if (!empty($data['errors'])){
            //$param['id']=$id;
            //$data['rows'] = $admin_product_model->get_all();
            //$data['errors']['teleno']="hello";
            //show($data['errors']);
            $this->view('admin/admin_products_add',$data);
        }

        else{
            //show($data['errors']);
            $data['title'] = "admin_product";
            $this->view('admin/admin_products_add', $data);
        };

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
        // show($fileExtension);

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
        if (move_uploaded_file($_FILES['image']["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            // move_uploaded_file("")
            show($targetFile);
            show($_FILES['image']["tmp_name"]);
            //show($file);
            //echo "Image Upload Failed inside the func.";
            return false;
        }

    }

}