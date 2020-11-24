<?php
include_once "Product.php";

class ProductManage
{
    public $productList;
    public $filePath = 'data.json';

    public function __construct()
    {
        $this->productList = [];
    }

    public function readFile()
    {
        $dataJson = file_get_contents($this->filePath);
        return json_decode($dataJson);
    }

    public function saveFile($data)
    {
        $dataJson = json_encode($data);
        file_put_contents($this->filePath, $dataJson);
    }

    public function getAll()
    {
        $arr = $this->readFile();
        $this->productList = [];
        foreach ($arr as $item) {
            $student = new Product($item->id, $item->name, $item->price, $item->quantity);
            array_push($this->productList, $student);
        }
        return $this->productList;
    }

    public function addProduct($product)
    {
        $this->productList = $this->readFile();
        $arr = [
            "id" => $product->getId(),
            "name" => $product->getName(),
            "price" => $product->getPrice(),
            "quantity" => $product->getQuantity()
        ];
        array_push($this->productList, $arr);
        $this->saveFile($this->productList);

    }

    public function getProductById($id)
    {
        $this->productList = $this->getAll();
        return $this->productList[$id];
    }

    public function editProduct($id, $product)
    {
        $this->productList = $this->readFile();
        $this->productList[$id] = [
            "id" => $product->getId(),
            "name" => $product->getName(),
            "price" => $product->getPrice(),
            "quantity" => $product->getQuantity()
        ];
        $this->saveFile($this->productList);
    }

    public function deleteProduct($id)
    {
        $this->productList = $this->readFile();
        array_splice($this->productList, $id, 1);
        $this->saveFile($this->productList);
    }

}