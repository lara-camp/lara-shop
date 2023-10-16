<?php
namespace App\Repository\Size;

interface SizeRepositoryInterface {
    public function get();
    public function store($data);
     public function edit($id);
    public function Update($data);
}
