<?php

namespace App\Controllers;
use App\Models\MainModel;
use CodeIgniter\Controller;

class SearchController extends BaseController
{
    public function index(): string
    {
        return view('Search_data');
    }

    public function search()

    {
        // Load the EmployeeModel
        $mainModel = new MainModel();

        // Retrieve email from the request
    $email = $this->request->getPost('email');

        // Retrieve employee data based on email
        $employee = $mainModel->where('mail', $email)->first();

        if ($employee) {
            return view('ProfileView', ['employee' => $employee]);
        } else {
            return view('noprofile');
        }
    }
    
    public function updateProfile()
    {
        // Load the EmployeeModel
        $mainModel = new MainModel();
    
        // Retrieve email from the request
        $email = $this->request->getPost('email');
    
        // Retrieve employee data based on email
        $employee = $mainModel->where('mail', $email)->first();
    
        if ($employee) {
            return view('update_profile', ['employee' => $employee]);
        } else {
            return view('noprofile');
        }
    }

    public function deleteProfile()
    {
        // Load the EmployeeModel
        $mainModel = new MainModel();

        // Retrieve email from the request
        $email = $this->request->getPost('email');

        // Delete the profile based on email
        $mainModel->where('mail', $email)->delete();

        // Redirect to another page or show a success message
        return redirect()->to('/')->with('success', 'Profile deleted successfully');
    }
 
}