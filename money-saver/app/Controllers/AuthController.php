<?php 
namespace App\Controllers;
use App\Models\UserModel;
class AuthController extends BaseController
{
    
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        
        return view('auth/register');
    }

    public function attemptLogin()
{
    $userModel = new UserModel();

    $email    = trim($this->request->getPost('email'));
    $password = $this->request->getPost('password');

    $user = $userModel->where('email', $email)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Email not found');
    }

    if (!password_verify($password, $user['password'])) {
        return redirect()->back()->with('error', 'Incorrect password');
    }

    // ✅ SUCCESS
    session()->set([
        'user_id'   => $user['id'],
        'user_email'=> $user['email'],
        'logged_in' => true
    ]);

    return redirect()->to('/dashboard');
}



    // public function attemptRegister()
    // {
    //     $userModel = new UserModel();

    //     $userModel->insert([
    //         'id'       => random_string('crypto', 16),
    //         'email'    => $this->request->getPost('email'),
    //         'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
    //     ]);

    //     return redirect()->to('/login')->with('success', 'Account created');
    // }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

   public function attemptRegister()
{
    helper('text');

    $email    = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $confirm  = $this->request->getPost('confirm_password');

    if ($password !== $confirm) {
        return redirect()->back()->with('error', 'Passwords do not match');
    }

    $userModel = new UserModel();

    if ($userModel->where('email', $email)->first()) {
        return redirect()->back()->with('error', 'Email already registered');
    }

    $userModel->insert([
        'id'       => random_string('crypto', 16),
        'email'    => $email,
        'password' => $password, // 🔥 plain password here
        'currency' => 'INR'
    ]);

    return redirect()->to('/login')->with('success', 'Account created. Please login.');
}


}
