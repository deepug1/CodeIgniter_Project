<?php namespace App\Controllers;
use App\Models\MainModel;
use CodeIgniter\Controller;

class MyController extends Controller
{
    public function index() {
        return view('Main_form');
    }

    public function insert()
    {
        // Ensure the request is a POST request
        if ($this->request->getMethod() === 'post') {

            $validation = \Config\Services::validation();

            // Define validation rules
            $validation->setRules([
                'fname' => 'required|min_length[3]|max_length[50]',
                'mname' => 'max_length[50]',
                'lname' => 'required|min_length[3]|max_length[50]',
                'gender' => 'required|in_list[male,female]',
                'mail' => 'required|valid_email|is_unique[employee.mail]',
                'mobile_no' => 'required|min_length[10]|max_length[15]',
                'date_of_birth' => 'required|valid_date',
                'status' => 'required|in_list[0,1]',
            ]);

        

            // Run validation
            if ($validation->withRequest($this->request)->run()) {
                // Validation passed, get the posted form data
             $file = $this->request->getFile('photograph');
            // Get the posted form data
            $formData = $this->request->getPost();

            // Check if 'photograph' field exists in form data





            // Initialize your model
            $mainModel = new MainModel();

            // Insert the data into the database
            $mainModel->insert($formData);

             // Store the inserted ID in the session as employee_id
            session()->set('employee_id', $formData);

            // Optionally, you can redirect to another page after successful insertion
            return redirect()->to('/')->with('success', 'Data inserted successfully');
            }else {
                // Validation failed, pass the errors to the view
                $data['validation'] = $validation;
                return view('Main_form', $data);
            }
        }


    }

    
}

