
<?php

class Man_view_feed extends Controller
{
    public function index()
    {
        //$id = $id ?? Auth::getId();

        $feedback = new Feedbacks;
        $data['rows'] = $feedback->all();

        // Pass $data array to the view


        $this->view('manager/man_view_feed', $data);
    }

}
