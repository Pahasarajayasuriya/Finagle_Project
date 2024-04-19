<?php

class Home extends Controller
{
    public function index()
    {
        $progressBarModel = new ProgressBarModel();
        $reviews = $progressBarModel->getLatestReviews();

        $data['title'] = "Home";
        $data['reviews'] = $reviews; // Pass the reviews to the view
        $this->view('customer/home', $data);
    }
}
