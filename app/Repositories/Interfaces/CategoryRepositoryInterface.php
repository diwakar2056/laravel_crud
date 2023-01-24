<?php
namespace App\Repositories\Interfaces;
Interface CategoryRepositoryInterface{
    public function all();

    public function store($data);
    public function find($id);
    public function update($request,$id);
    public function delete($id);
    
}

