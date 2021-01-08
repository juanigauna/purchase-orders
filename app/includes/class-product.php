<?php
class Product {
    public $productId;
    public $userId;
    public $prId;
    public $page;
    public $description;
    public $code;
    public $quantity;
    public $price;
    public $import;
    public $time;
    public function __contruct($args) {
        $this->productId = isset($args['productId']) ? $args['productId'] : null;
        $this->userId = isset($args['userId']) ? $args['userId'] : null;
    }
}