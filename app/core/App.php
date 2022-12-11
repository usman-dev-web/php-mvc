<?php

class App
{
    protected $controller = "Home";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // controller
        if ($url == NULL) {
            $url = [$this->controller];
        }
        if (file_exists("../app/controllers/" . $url[0] . ".php")) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                // var_dump($url);
                unset($url[1]);
            }
        }

        //params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller dan method serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        // routing url
        if (isset($_GET['url'])) {
            // menghapus tanda \ pada akhir url
            $url = rtrim($_GET['url'], "/");
            // menambah filter untuk membersihkan url dari karakter yang aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // memecah string url
            $url = explode("/", $url);
            return $url;
        }
    }
}
