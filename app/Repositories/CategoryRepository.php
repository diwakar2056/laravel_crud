<?php 
namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface{

    public function all(){
        return Category::latest()->get();

    }

    public function store($data){

        // $category = new Category;
        // $category->title = $data->title;
        // $category->author = $data->author;
        // $category->contents = $data->contents;
        // $category->save();
        Category::create($data);
    }
    public function find($id){
        return Category::where('id',$id)->first(); 
    }
    public function update($data,$id){

        $category = Category::where('id',$id)->first();
        $category->title = $data['title'];
        $category->author = $data['author'];
        $category->contents = $data['contents'];
        $category->save();

    }
    public function delete($id){
        $category = Category::whereId($id)->first();
        $category->delete();

    }
}