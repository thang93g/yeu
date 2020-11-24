<?php
include_once "Product.php";
include_once "ProductManage.php";

$index = $_GET["id"];
$productManage = new ProductManage();

$product = $productManage->getProductById($index);


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    $newProduct = new Product($id,$name,$price,$quantity);
    $productManage = new ProductManage();

    $index = $_GET["id"];
    $productManage->editProduct($index,$newProduct);

    header("location:index.php");
}

?>
<form method="post">
    id:<input type="number" name="id" value="<?php echo $product->getId(); ?>">
    name:<input type="text" name="name" value="<?php echo $product->getName(); ?>">
    price:<input type="number" name="price" value="<?php echo $product->getPrice(); ?>">
    quantity:<input type="number" name="quantity" value="<?php echo $product->getQuantity(); ?>">
    <input type="submit" value="Update">
</form>
