<?php
namespace app;

class Router {
    public array $getRoutes = [];
    public array $postRoutes = [];
    public Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }
    
    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    //detect current routes and method
    public function resolve()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $url = $_SERVER['PATH_INFO'] ?? '/';

        if ($method === 'get') {
            $fn = $this->getRoutes[$url] ?? null;
        } else {
            $fn = $this->postRoutes[$url] ?? null;
        }
        if($fn){
            call_user_func($fn, $this);
        } else {
            echo "Page not found";
        }
    }

    public function renderView($view, $params = [])
    {
        foreach ($params as $key => $value){
            //$$key is fro creating a variable variable
            //in ProductController.php, $params is ['products' => $products]
            $$key = $value;
        }
        ob_start();//start caching output, save in the local buffer not send to the browser
        include_once __DIR__."/views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__."/views/_layout.php";
    }
    
}