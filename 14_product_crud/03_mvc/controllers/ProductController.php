<?php

namespace app\controllers;

use app\Router;

class ProductController
{
   public static function index(Router $router)
   {
      $search = $_GET['search'] ?? '';
      $products = $router->db->getProducts($search);
      // echo "<pre>";
      // var_dump($products);
      // echo "</pre>";
      $router->renderView('products/index', [
         'products' => $products,
         'search' => $search
      ]);
   }
   public static function create(Router $router)
   {
      $error = [];
      $product = [
         'title' => '',
         'image' => '',
         'description' => '',
         'price' => ''
      ];
      if ($_SERVER['REQUEST_METHOD']==='POST'){
         
      }

      $router->renderView('products/create', [
      'product' => $product,
      'error' => $error
      ]);
   }
   public static function update()
   {
      echo "update page";
   }
   public function delete()
   {
      echo "delete page";
   }
}