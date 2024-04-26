<?php

class Home extends Controller
{
    public function index()
    {
        $progressBarModel = new ProgressBarModel();
        $newlyadedModel = new ProductModel;
        $advertisementModel = new admin_advertisementsModel(); // Add this line

        $reviews = $progressBarModel->getLatestReviews();
        $newlyAdded = $newlyadedModel->getLastProducts();
        $advertisements = $advertisementModel->get_active_advertisements(); // Add this line

        $data['title'] = "Home";
        $data['reviews'] = $reviews; // Pass the reviews to the view
        $data['newlyAdded'] = $newlyAdded; // Pass the newly added products to the view
        $data['advertisements'] = $advertisements; // Pass the active advertisements to the view
        $this->view('customer/home', $data);
    }
}
