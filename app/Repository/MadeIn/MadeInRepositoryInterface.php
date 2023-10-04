<?php
namespace App\Repository\MadeIn;

interface MadeInRepositoryInterface {

    public function create(array $data);
    public function store();
    public function edit(int $id);
    public function update(array $data);
    public function delete(int $id);
}
