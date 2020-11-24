<form method="post">
    id:<input type="number" name="id">
    name:<input type="text" name="name">
    price:<input type="number" name="price">
    quantity:<input type="number" name="quantity">
    <input type="submit" value="add">
</form>
<?php
include_once "Product.php";
include_once "ProductManage.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    $product = new Product($id,$name,$price,$quantity);
    $productManage = new ProductManage();
    $productManage->addProduct($product);
    header('location:index.php');
}