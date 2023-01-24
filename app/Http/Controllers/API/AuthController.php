<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    private $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository){
            $this -> categoryRepository = $categoryRepository;
    }
    

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'c_password' => 'required | same:password'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'user register successfully'
        ];
        //return response()->json($response,200);
        return redirect("user-login");
    }



    public function login(Request $request)
    {
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $request->user()->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'user login successfully'
            ];
            //return response()->json($response,200);
            $categories = $this->categoryRepository->all(); 
            return view('categories.list', compact(['categories']));
            //return view("dashboard");

        }
        else{
            $response = [
                'success' => false,
                'message' => 'Unauthorised'
            ];
            //return response()->json($response);
            return redirect("user-login")->withSuccess('user credential wrong ');
        }
    }
    //


    // public function dashboard(){
    //     if(Auth::check()){
    //         return view('dashboard');
    //     }  
    //     return redirect("login")->withSuccess('Please Login to access dashboard');
    // }



    public function getData($id=null){
        return $id?User::find($id):User::all();
    }
        
    public function signOut() {
           session()->flush();
            Auth::logout();
            return redirect("user-login");
    }

}
