<?php

    $title = $_POST['title']; //test
    $description = $_POST['description'];
    $price = $_POST['price'];
    $imagePath = '';
    if (!$title) {
        $error[] = 'Product title is required';
    }
    if (!$price) {
    $error[] = 'Product price is required';
    }

    if (!is_dir(__DIR__.'/public/images')) {
        mkdir(__DIR__.'/public/images');
    }

    if (!$error){
        $image = $_FILES['image'] ?? null;
        $imagePath = $product['image'];
        
        //upload new image
        if ($image && $image['tmp_name']) {
            //delete old image first
            if ($product['image']) {
                unlink(__DIR__.'/public/'.$product['image']);
            }
            $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
            // echo $imagePath;
            mkdir(dirname(__DIR__.'/public/'.$imagePath));
            move_uploaded_file($image['tmp_name'], __DIR__.'/public/'.$imagePath);
        }
        
    
    }
?>