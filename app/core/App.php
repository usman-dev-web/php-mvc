<?php

class App{
    public function __construct()
    {
        $url = $this->parseUrl();
        var_dump($url);
    }

    public function parseUrl(){
        // routing url
        if(isset($_GET['url'])){
            // menghapus tanda \ pada akhir url
            $url = rtrim($_GET['url'],"/");
            // menambah filter untuk membersihkan url dari karakter yang aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // memecah string url
            $url = explode("/", $url);
            return $url;
        }
    }
}