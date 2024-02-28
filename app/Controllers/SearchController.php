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
            $eid = $employee['eid'] ?? null;
            if ($eid !== null) {
                return view('update_profile', ['employee' => $employee, 'eid' => $eid]);
            } else {
                return view('noprofile');
            }
        } else {
            return view('noprofile');
        }
    }



    public function saveUpdatedProfile()
    {
        $mainModel = new MainModel();
        $email = $this->request->getPost('mail');
        $employee = $mainModel->where('mail', $email)->first();

        if ($employee) {
            $updatedData = [
                'fname' => $this->request->getPost('fname'),
                'mname' => $this->request->getPost('mname'),
                'lname' => $this->request->getPost('lname'),
                'gender' => $this->request->getPost('gender'),
                'mobile_no' => $this->request->getPost('mobile_no'),
                'date_of_birth' => $this->request->getPost('date_of_birth'),
                'status' => $this->request->getPost('status'),
            ];
            $photograph = $this->request->getFile('photograph');
            if ($photograph->isValid() && !$photograph->hasMoved()) {
                $newName = $photograph->getRandomName();
                $photograph->move(WRITEPATH . 'uploads', $newName);
                $updatedData['photograph'] = 'uploads/' . $newName;
            }
            $mainModel->update($employee['eid'], $updatedData);
            return redirect()->to('/')->with('success', 'Profile updated successfully');
        } else {
            return view('noprofile');
        }
    }


    public function deleteProfile()
    {
        $mainModel = new MainModel();
        $email = $this->request->getPost('email');
        $mainModel->where('mail', $email)->delete();
        return redirect()->to('/')->with('success', 'Profile deleted successfully');
    }
}
