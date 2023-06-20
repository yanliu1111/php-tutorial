<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Error connection threw exception
$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC'); // Prepare statement
$statement->execute(); // Execute statement
$products = $statement->fetchAll(PDO::FETCH_ASSOC); // Fetch all products
// echo '<pre>';
// var_dump($products);
// echo '</pre>';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
  </head>
  <body>
    <h1>Product CRUD</h1>
    <p>
        <a href="create.php" class="btn btn-success">Create</a>
    </p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Create Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>  
    <?php foreach ($products as $i => $product): ?>
        <tr>
            <th scope="row"><?php echo $i+1 ?></th>
            <td></td>
            <td><?php echo $product['title'] ?></td>
            <td><?php echo $product['price'] ?></td>
            <td><?php echo $product['create_date'] ?></td>
            <td>
            <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
   </tbody>
</table>
  </body>
</html>