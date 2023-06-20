<?php

/** @var $pdo \PDO */
$pdo = require_once "database.php";
require_once "functions.php";

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
    
    require_once "validate_product.php";
if (!$error){    
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
?>

<?php include_once "views/partials/header.php" ?>

<body>
    <p>
        <a href="index.php" class="btn btn-secondary">Go Back to Products Page</a>

    </p>
    <h1>Update Product <?php echo $product['title']?></h1>
    <?php include_once "views/products/form.php" ?>

</body>

</html>