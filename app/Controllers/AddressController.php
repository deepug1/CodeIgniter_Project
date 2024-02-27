<?php namespace App\Controllers;
use App\Models\MainModel;
use App\Models\AddressModel;
use App\Models\SelectModel;
use CodeIgniter\Controller;

class AddressController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new SelectModel();;
    }
    public function index() {
        $model=new SelectModel();
        $country = $model->selectData("countries");
        $data['country'] = $country;
        return view('Address', $data);
    }


    public function insertaddress()
    {
        helper(['form']);
        // Ensure the request is a POST request
        if ($this->request->getMethod() === 'post') {
            // Get the posted form data
            $formData = $this->request->getPost();

            // Initialize your model
            $addressModel = new AddressModel();

             // Validate the form data
             $validation = \Config\Services::validation();
             $validation->setRules([
                 'add_line1' => 'required',
                 'add_line2' => 'required',
                 'Country' => 'required',
                 'State' => 'required',
                 'City' => 'required',
                 'pincode' => 'required|min_length[6]|max_length[10]',
             ]);
 
             if ($validation->withRequest($this->request)->run()) {
                 // Validation passed, insert the data into the database
                 $addressModel->insert($formData);
 
                 // Optionally, you can redirect to another page after successful insertion
                 return redirect()->to('/')->with('success', 'Data inserted successfully');
             } else {
                 // Validation failed, pass the errors to the view
                 $data['validation'] = $validation;
                 return view('Address', $data);
        }
    }

    }


public function state()
{
    $model=new SelectModel();
    $countryID = $this->request->getPost("cId");
    $stateData = $this->model->selectData("states", array("country_id" => $countryID));

    $output1 = "";
    foreach ($stateData as $state) {
        $output1 .= "<option value='$state->name'>$state->name</option>";
    }
    echo json_encode($output1);
   
}
   

    
public function city()
{
    $stateID = $this->request->getPost("sid");
    $cityData = $this->model->selectData("cities", array("state_id" => $stateID));
    $output2 = "<option>Select City</select>";
    foreach ($cityData as $city) {
        $output2 .= "<option value='$city->name'>$city->name</option>";
    }
    echo json_encode($output2);
}
}