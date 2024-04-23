<?php

class Admin_products extends Controller
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

            if ($validatedData) {
                // Handle file upload for the image
                //show("sjlkdfsljldkf");
                //show($_FILES);
                $imagePath = $this->uploadImage($_FILES['image']);
                if ($imagePath) {
                    $validatedData['image'] = $imagePath;

                    // Insert the product into the database
                    $admin_product_model->insert($validatedData);

                    // Redirect to avoid form resubmission
                    redirect('admin_products');
                } else {
                    // Handle image upload failure

                   // echo "Image Upload Failed firstly.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_product_model->errors;

            }
        }
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Validate and sanitize input data
            $validatedData = $admin_product_model->validate($_POST);
            //show($data);
            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    $id=$_POST['id'];
                    unset($_POST['id']);
                    unset($_POST['update']);
                    show($_POST);
                    // UPdate the DB
                    $imagePath = $this->uploadImage($_FILES['image']);
                    $validatedData['image'] = $imagePath;
                    $admin_product_model->update($id,$validatedData);

                    // Redirect to avoid form resubmission
                    redirect('admin_products');
                } else {
                    // Handle image upload failure

                    //echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_product_model->errors;

            // }
        }

        $data['title'] = "admin_products";
        $this->view('admin/admin_products', $data);

    }

    public function delete_product($id)
    {
        $admin_product_model = new admin_productsModel();
        $admin_product_model->del_product($id);
        redirect('admin_products');
    }

    public function update_product($id)
    {
        //get the ID and call the view which have UI to update the datas and that view will send a post request to index function
        $param['id']=$id;
        $admin_product_model = new admin_productsModel();
        $data['rows'] = $admin_product_model->get_all();
        // show($data) row is an array;
        $data['row']=$admin_product_model->where($param);
        $data['errors'] = [];
        $this->view('admin/admin_products_update',$data);

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