<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Error connection threw exception

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
    <h1>Create New Product</h1>
    <form>
  <div class="mb-3">
    <label class="form-label">Product Image</label>
    <br>
    <input type="file">
  </div>
  <div class="mb-3">
    <label class="form-label">Product Title</label>
    <input type="text" class="form-control" >
  </div>
  <div class="mb-3">
    <label class="form-label">Product Description</label>
    <textarea class="form-control" ></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Product Price</label>
    <input type="number" step=".01" class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
  </body>
</html>