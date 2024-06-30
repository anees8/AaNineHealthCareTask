<?php namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('/home');
        }
        return view('login');
    }
    
    public function login()
    {
        $session = session();

        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $model->where('email', $email)->first();

        if ($user) {
            $passwordVerify = password_verify($password, $user['password']);
            if ($passwordVerify) {
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'isLoggedIn' => true,
                ]);
                return redirect()->to('/home');
            } else {
                return redirect()->to('/')->with('error', 'Invalid email or password');
            }
        } else {
            return redirect()->to('/')->with('error', 'Invalid email or password');
        }

    }

    public function register()
    {
       
        if ($this->request->getMethod() === 'POST') {
            $userModel = new UserModel();
            if (! $this->validate($userModel->validationRules, $userModel->validationMessages)) {
                // If validation fails, reload the registration form with errors
                return view('register', [
                    'validation' => $this->validator,
                ]);
            }
            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                // Hash the password before saving it
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
    
            // Assuming you have a model to handle database operations
           
            $userModel->insert($data);
            return redirect()->to('/');
        }
        return view('register');
    }

    public function logout()
    {        
        session()->destroy();
        return redirect()->to('/');
    }
}
