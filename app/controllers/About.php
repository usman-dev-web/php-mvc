<?php

class About extends Controller
{
    public function index($nama = "Usman", $pekerjaan = "Web dev")
    {
        $this->view("about/index");
    }
    public function page()
    {
        $this->view("about/page");
    }
}
