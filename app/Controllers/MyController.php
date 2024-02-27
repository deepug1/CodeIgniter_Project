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

        

            
            if ($validation->withRequest($this->request)->run()) {
             $file = $this->request->getFile('photograph');
            $formData = $this->request->getPost();

            $mainModel = new MainModel();

            $mainModel->insert($formData);

            session()->set('employee_id', $formData);

    
            return redirect()->to('/')->with('success', 'Data inserted successfully');
            }else {
                $data['validation'] = $validation;
                return view('Main_form', $data);
            }
        }


    }

    
}

