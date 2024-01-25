<?php

class Recipes extends Controller
{
    public function index()
    {
        $data['title'] = "Recipes";
        $this->view('customer/recipes', $data);
    }
}
