<?php
namespace App\Repository\Category;

interface CategoryRepositoryInterface {

    public function create($data);
    public function store();
    public function edit($id);
    public function update($data);
}
