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

    if (!is_dir('images')) {
        mkdir('images');
    }

    if (!$error){
        $image = $_FILES['image'] ?? null;
        $imagePath = $product['image'];
        
        //upload new image
        if ($image && $image['tmp_name']) {
            //delete old image first
            if ($product['image']) {
                unlink($product['image']);
            }
            $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
            // echo $imagePath;
            mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'], $imagePath);
        }
        
    
    }
?>