<?php
namespace App\Repository\Product;

interface ProductRepositoryInterface {

    public function create(array $data);
    public function get();
    public function edit(int $id);
    public function update(array $data);
    public function delete(int $id);
}
