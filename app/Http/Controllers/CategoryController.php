<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;


use App\Http\Controllers\API\AuthController;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
class CategoryController extends Controller
{
    //
    private $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository){
            $this -> categoryRepository = $categoryRepository;
    }



    public function index(){
        //if(Auth::check()){
            $categories = $this->categoryRepository->all(); 
        return view('categories.list', compact(['categories']));
       // }
   
        // return redirect("login")->withSuccess('Please Login to access dashboard');

        
    }

    public function view($id){
        //$categories = Category::get();
        $categories= Category::where('id',$id)->first();
        return view('categories.view', compact(['categories']));
    }

    public function create(){
        return view('categories.new');
    }


    public function store(Request $request){
        //dd($request->title);
        $request->validate([
            'title' => 'required | max:250',
            'author' => 'required | max: 20',
        ]);
        $this->categoryRepository->store($request->all());
        return redirect('/')->withSuccess('New Post created !!');
    }

    public function edit($id){
       //dd($id);
       $category = $this->categoryRepository->find($id);
       return view('categories.edit',compact(['category']));
    }
    
    
    public function update(Request $request ,$id){
        $this->categoryRepository->update($request->all(),$id);
        return redirect('/')->withSuccess("post updated !!");
    }

    public function delete($id){
        $this->categoryRepository->delete($id);
        return redirect('/')->withSuccess("1 post deleted!!");
    }

    // public function getData(){
     
    //     //return ["name"=>"diwakar","email"=>"diwakar@gmail.com","address"=>"chandigarh"];
    //     return Category::all();
    // }

    public function getData($id=null){
     
        return $id?Category::find($id):Category::all();
    }
}
