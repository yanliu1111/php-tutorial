<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($product);
// echo '</pre>';
// exit;

$error=[];
$title = $product['title'];
$description = $product['description'];
$price = $product['price'];
// echo $_SERVER['REQUEST_METHOD'] . '<br>';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = $_POST['title']; //test
    $description = $_POST['description'];
    $price = $_POST['price'];
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
        
    $statement = $pdo->prepare("UPDATE products SET title = :title, image=:image, description=:description, price=:price where id=:id");
    $statement->bindValue(':title', $title);
    $statement->bindValue(':image', $imagePath);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('Location: index.php');
    }
}
//build random str for image name
function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }

    return $str;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
</head>

<body>
    <p>
        <a href="index.php" class="btn btn-secondary">Go Back to Products Page</a>

    </p>
    <h1>Update Product <?php echo $product['title']?></h1>
    <?php if(!empty($error)): ?>
    <div class="alert alert-danger">
        <?php foreach ($error as $error): ?>
        <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">
        <?php if ($product['image']): ?>
        <img src="<?php echo $product['image'] ?>" class="update-image">

        <?php endif; ?>
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <br>
            <input type="file" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">Product Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Product Description</label>
            <textarea class="form-control" name="description"><?php echo $description ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="number" step=".01" name="price" class="form-control" value="<?php echo $price ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>