<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Post;
use App\Models\User; // important to reqire the model file 

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }



    public function loginstore(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
            ]);
            $user = User::where('email', $request->email)->first();
            if(!$user || !Hash::check($request->password, $user->password)){ // if not user or the hashed password equal  return direct 
                return back()->with('error', 'Invalid Credentials');
                }
                $request->session()->put('user', $user); // make session and put the user in it 
                return redirect()->route('posts.index');
            
        
    }
    
    public function register(){
        return view('auth.register');
        //
    }

    

    
    public function registerstore(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirmation' => 'required|same:password',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
    
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture')->store('profile-pictures', 'public');
            $user->profile_picture = $profilePicture;
        }
    
        if ($user->save()) {
            return redirect()->route('auth.login')->with('success', 'User created successfully');
        }
    
        return redirect()->route('auth.register')->with('error', 'User registration failed');
    }
    



   














}
