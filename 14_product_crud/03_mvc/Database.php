<?php
namespace app;
use PDO;
class Database
{
    //make pdo as class property
    public \PDO $pdo;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    //create a method to get all products
    public function getProducts($search='')
    {
        if ($search){
            $statement = $this->pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC'); // Prepare statement
            $statement->bindValue(':title', "%$search%");
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
        }

        $statement->execute(); // Execute statement
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}