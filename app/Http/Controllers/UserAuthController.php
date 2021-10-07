<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UserAuthController extends Controller
{
//    public function __construct(User $post)
//    {
//        $this->post=$post;
//    }

    function login(){
        return view('auth.login');
    }

    function Register(){
        return view('auth.register');
    }

    function create(Request $request)
    {

        // dd($request->all());
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:50',
        'email' => 'required|email|unique:email',
        'password' => 'required'
    ]);

    // $user= $this->User->where('email',$request->email)->first();
    // dispatch( new SendEmailJob($user));
    $post = new User();
    $post->name = $request->name;
    $post->email = $request->email;
    $post->password = Hash::make($request->password);
    $query = $post->save();

    // if($query){
    //     return back()->with('success','you have been successfull');
    // }else{
    //     return back()->with('fail','somthing is wrong');
    // }
    return redirect()->route('students.index')->with('success','Register Successfully');

    }

    function check(Request $request)
    {
        // return $request->input();    

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:email',
            'password' => 'required|min:5'
        ]);

        $credentials = $request->only('email', 'password');

        if (User::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }


    public function post()
    {
        return view('post');
    }
}


