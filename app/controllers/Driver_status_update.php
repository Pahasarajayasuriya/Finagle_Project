<?php

class Driver_status_update extends Controller
{

        public function index()
        {

                $user = new User();

                if (!empty($_POST['id_array'])) {


                        if ($_POST['status'] == "availability") {


                            unset($_POST['status']);

                            // // only get one id from id_array 
                            $id = $_POST['id_array'];
                            $arr['availability_status'] = 1;

                            //echo json_encode($id);

                           $user->update($id,$arr);
                        }

                     //   echo json_encode(['update' => true]);
               
        }
}

}