<?php

class Otp extends Controller
{
    public function index()
    {
        $data['title'] = "OTP";
        $this->view('otp', $data);
    }
}
