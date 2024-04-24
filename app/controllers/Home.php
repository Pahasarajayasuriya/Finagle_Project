<?php

class Home extends Controller
{
    public function index()
    {
        $progressBarModel = new ProgressBarModel();
        $newlyadedModel = new ProductModel;
        $reviews = $progressBarModel->getLatestReviews();
        $newlyAdded = $newlyadedModel->getLastProducts();

        $data['title'] = "Home";
        $data['reviews'] = $reviews; // Pass the reviews to the view
        $data['newlyAdded'] = $newlyAdded; // Pass the newly added products to the view
        $this->view('customer/home', $data);
    }
}
