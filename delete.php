<?php
include_once "Product.php";
include_once "ProductManage.php";

$id = $_GET["id"];
$productManage = new ProductManage();
$productManage->deleteProduct($id);
header("location:index.php");