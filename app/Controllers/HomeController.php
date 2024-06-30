<?php
namespace App\Controllers;
use App\Models\UserModel;

class HomeController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); // Fetch all users (you may modify this query as per your application logic)

        return view('home', $data);
    }
}
