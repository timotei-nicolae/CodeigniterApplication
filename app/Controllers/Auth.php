<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\UserModel;

class Auth extends BaseController
{
    // Enabling features
    public function __construct()
    {
        helper(['url', 'form', 'validation_form']);
    }

    
    //RESPONSIBLE FOR LOGIN PAGE
    
    public function index()
    {
        return view('auth/login');
    }

    //RESPONSIBLE FOR REGISTER PAGE
    public function register()
    {
        return view('auth/register');
    }


    /**
        *Save new user to database
     */

    public function registerUser(){

    //     //Validate user input

    //     $validated = $this->validate([
    //         'name' => 'required',
    //         'email' => 'required|valid_email',
    //         'password' => 'required|min_length[5]|max_length[20]',
    //         'passwordConf' => 'required|min_length[5]|max_length[20]|matches[password]'
    //     ]);
    

    //     if(!$validated)
    //     {
    //         return view('auth/register', ['validation' => $this->validator]);
            
    //     }
    

        
        //HERE WE SAVE THE USER

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => Hash::encrypt($password)
        ];

        //STORING DATA

        $userModel = new \App\Models\UserModel();
        // $userModel = model(App\Models\UserModel::class);
        $query = $userModel->insert($data);

        if(!$query)
        {
            return redirect()->back()->with('fail', 'Saving user failed');
        }
        else
        {
            return redirect()->to('register')->with('success', 'Registered succesfully');
        }
        
    }   


    /**
        *User login method
     */

    public function loginUser(){

        //CHECKING USER DETAILS IN DATABASE

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        $userModel = new UserModel();
        $userInfo = $userModel->where('email', $email)->first();

        $checkPassword = Hash::check($password, $userInfo['password']);

        if(!$checkPassword)
        {
            session()->setFlashdata('fail', 'Incorect password provided');
            return redirect()->to('auth');
        }
        else
        {
            //Process user info

            $userId = $userInfo['id'];

            session()->set('loggedInUser', $userId);
            return redirect()->to('/dashboard');
        }

    }
        
}


?>

