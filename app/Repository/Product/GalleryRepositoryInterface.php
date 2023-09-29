<?php
namespace App\Repository\Product;

interface GalleryRepositoryInterface {
    public function getProductGallery(int $id);
    public function getProductGalleryById(int $productId);
    public function storeProductGallery(array $data);
    public function updateProductGallery (array $data);
    public function deleteProductGallery(int $id);
}
