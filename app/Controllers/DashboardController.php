<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CropRotationModel;
use App\Models\VIewFieldsModel;
use App\Models\JobsModel;
use App\Models\HarvestModel;
use App\Models\RotationModel;

class DashboardController extends BaseController
{
    private $field;
    private $jobs;
    private $harvest;
    private $user;
    private $planting;

    public function __construct()
    {
        $this->field = new \App\Models\VIewFieldsModel();
        $this->jobs = new \App\Models\JobsModel();
        $this->harvest = new \App\Models\HarvestModel();
        $this->user = new \App\Models\RegisterModel();
        $this->planting = new \App\Models\PlantingModel();
    }
    public function field($field)
    {
        echo $field;
    }
    public function crop($crop)
    {
        echo $crop;
    }
    public function job($jobs)
    {
        echo $jobs;
    }

    public function farmerdashboard()
    {
        return view('userFolder/dashboard');
    }



    //fields


    public function viewfields()
    {
        $data = [
            'field' => $this->field->findAll()
        ];
        return view('userfolder/viewfields', $data);
    }
    public function addnewfield()
    {
        $userId = session()->get('farmer_id');

        // Validate the form data
        $validation = $this->validate([
            'field_name' => 'required',
            'field_address' => 'required',
            'field_total_area' => 'required',
        ]);

        if (!$validation) {
            // Validation failed, return to the form with errors
            return view('userfolder/viewfields', ['validation' => $this->validator]);
        }

        // If validation passes, insert the data into the database
        $this->field->save([
            'field_name' => $this->request->getPost('field_name'),
            'field_owner' => $this->request->getPost('field_owner'),
            'field_address' => $this->request->getPost('field_address'),
            'field_total_area' => $this->request->getPost('field_total_area'),
            'user_id' => $userId,
        ]);

        // Redirect to a success page or display a success message
        return redirect()->to('/viewfields')->with('success', 'Field added successfully');
    }
    public function add()
    {
        // Load the form view
        return view('field/add');
    }


    public function edit($field_id)
    {
        // Load the product to be edited from the database
        $model = new VIewFieldsModel();
        $field = $model->find($field_id);

        // Load the edit view with the product data
        return view('field', ['field' => $field]);
    }
    public function update()
    {
        // Handle the form submission to update the product
        $model = new VIewFieldsModel();

        // Retrieve the field_id from the form input
        $field_id = $this->request->getPost('field_id');

        // Define the data to be updated
        $dataToUpdate = [
            'field_name' => $this->request->getPost('field_name'),
            'field_owner' => $this->request->getPost('field_owner'),
            'field_address' => $this->request->getPost('field_address'),
            'field_total_area' => $this->request->getPost('field_total_area'),
        ];

        // Update the product in the database using the update() method
        $model->update($field_id, $dataToUpdate);

        // Redirect back to the product list or a success page
        return redirect()->to('/viewfields')->with('success', 'Field updated successfully');
    }
    public function deleteProduct($field_id)
    {
        // Load the model
        $model = new VIewFieldsModel();

        // Check if the product with the given field_ID exists
        $field = $model->find($field_id);

        if ($field) {
            // Delete the field from the database
            $model->delete($field_id);

            // Redirect back to the field list with a success message
            return redirect()->to('/viewfields')->with('success', 'field deleted successfully');
        } else {
            // Redirect back to the field list with an error message if the field doesn't exist
            return redirect()->to('/viewfields')->with('error', 'field not found');
        }
    }

    //crop planting
    public function cropplanting()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/sign_ins');
        } else {
            $data = [
                'planting' => $this->planting->findAll()
            ];
            return view('userfolder/cropplanting', $data);
        }
    }
    public function addnewplanting()
    {
        $userId = session()->get('farmer_id');

        // Validate the form data
        $validation = $this->validate([
            'field_name' => 'required',
            'crop_variety' => 'required',
        ]);

        if (!$validation) {
            // Validation failed, return to the form with errors
            return view('userfolder/viewfields', ['validation' => $this->validator]);
        }

        $this->planting->save([
            'field_name' => $this->request->getPost('field_name'),
            'crop_variety' => $this->request->getPost('crop_variety'),
            'planting_date' => $this->request->getPost('planting_date'),
            'season' => $this->request->getPost('season'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'notes' => $this->request->getPost('notes'),
            'user_id' => $userId,
        ]);

        // Redirect to a success page or display a success message
        return redirect()->to('/cropplanting')->with('success', 'Field added successfully');
    }

    //jobs

    public function jobs()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/sign_ins');
        } else {
            $data = [
                'jobs' => $this->jobs->findAll()
            ];
            return view('userfolder/jobs', $data);
        }
    }
    public function addnewjob()
    {

        // Create a new instance of your model
        $model = new JobsModel();

        // Validate the form data
        $validation = $this->validate([
            'job_name' => 'required',
            'field_name' => 'required',
            'finished_date' => 'required',
            'worker_name' => 'required',
            'equipment_use' => 'required',
            'quantity_use' => 'required',
            'total_money_spent' => 'required',
            'notes' => 'required',
        ]);

        if (!$validation) {
            // Validation failed, return to the form with errors
            return view('userfolder/jobs', ['validation' => $this->validator]);
        }

        // If validation passes, insert the data into the database
        $model->save([
            'job_name' => $this->request->getPost('job_name'),
            'field_name' => $this->request->getPost('field_name'),
            'finished_date' => $this->request->getPost('finished_date'),
            'worker_name' => $this->request->getPost('worker_name'),
            'equipment_use' => $this->request->getPost('equipment_use'),
            'quantity_use' => $this->request->getPost('quantity_use'),
            'total_money_spent' => $this->request->getPost('total_money_spent'),
            'notes' => $this->request->getPost('notes'),
        ]);

        // Redirect to a success page or display a success message
        return redirect()->to('/jobs')->with('success', 'Job added successfully');
    }


    public function editjob($job_id)
    {
        // Load the product to be edited from the database
        $model = new JobsModel();
        $jobs = $model->find($job_id);

        // Load the edit view with the product data
        return view('jobs', ['jobs' => $jobs]);
    }
    public function updatejob()
    {
        // Handle the form submission to update the product
        $model = new JobsModel();

        // Retrieve the field_id from the form input
        $job_id = $this->request->getPost('job_id');

        // Define the data to be updated
        $dataToUpdate = [
            'job_name' => $this->request->getPost('job_name'),
            'field_name' => $this->request->getPost('field_name'),
            'finished_date' => $this->request->getPost('finished_date'),
            'worker_name' => $this->request->getPost('worker_name'),
            'equipment_use' => $this->request->getPost('equipment_use'),
            'quantity_use' => $this->request->getPost('quantity_use'),
            'total_money_spent' => $this->request->getPost('total_money_spent'),
            'notes' => $this->request->getPost('notes'),
        ];

        // Update the product in the database using the update() method
        $model->update($job_id, $dataToUpdate);

        // Redirect back to the product list or a success page
        return redirect()->to('/jobs')->with('success', 'Job updated successfully');
    }
    public function deleteJob($job_id)
    {
        // Load the model
        $model = new JobsModel();

        // Check if the product with the given field_ID exists
        $jobs = $model->find($job_id);

        if ($jobs) {
            // Delete the jobs from the database
            $model->delete($job_id);

            // Redirect back to the jobs list with a success message
            return redirect()->to('/jobs')->with('success', 'jobs deleted successfully');
        } else {
            // Redirect back to the jobs list with an error message if the jobs doesn't exist
            return redirect()->to('/jobs')->with('error', 'jobs not found');
        }
    }

    //harvest

    public function harvest()
    {
        $data = [
            'harvest' => $this->harvest->findAll()
        ];
        return view('userfolder/harvest', $data);
    }
    public function addnewharvest()
    {

        // Create a new instance of your model
        $model = new HarvestModel();

        // Validate the form data
        $validation = $this->validate([
            'field_name' => 'required',
            'variety_name' => 'required',
            'harvest_quantity' => 'required',
            'total_revenue' => 'required',
            'harvest_date' => 'required',
            'notes' => 'required',
        ]);

        if (!$validation) {
            // Validation failed, return to the form with errors
            return view('userfolder/harvest', ['validation' => $this->validator]);
        }

        // If validation passes, insert the data into the database
        $model->save([
            'field_name' => $this->request->getPost('field_name'),
            'variety_name' => $this->request->getPost('variety_name'),
            'harvest_quantity' => $this->request->getPost('harvest_quantity'),
            'total_revenue' => $this->request->getPost('total_revenue'),
            'harvest_date' => $this->request->getPost('harvest_date'),
            'notes' => $this->request->getPost('notes'),
        ]);

        // Redirect to a success page or display a success message
        return redirect()->to('/harvest')->with('success', 'Harvest added successfully');
    }


    public function editharvest($harvest_id)
    {
        // Load the product to be edited from the database
        $model = new HarvestModel();
        $harvest = $model->find($harvest_id);

        // Load the edit view with the product data
        return view('harvest', ['harvest' => $harvest]);
    }
    public function updateharvest()
    {
        // Handle the form submission to update the product
        $model = new HarvestModel();

        // Retrieve the field_id from the form input
        $harvest_id = $this->request->getPost('harvest_id');

        // Define the data to be updated
        $dataToUpdate = [
            'field_name' => $this->request->getPost('field_name'),
            'variety_name' => $this->request->getPost('variety_name'),
            'harvest_quantity' => $this->request->getPost('harvest_quantity'),
            'total_revenue' => $this->request->getPost('total_revenue'),
            'harvest_date' => $this->request->getPost('harvest_date'),
            'notes' => $this->request->getPost('notes'),
        ];

        // Update the product in the database using the update() method
        $model->update($harvest_id, $dataToUpdate);

        // Redirect back to the product list or a success page
        return redirect()->to('/harvest')->with('success', 'Harvest updated successfully');
    }
    public function deleteHarvest($harvest_id)
    {
        // Load the model
        $model = new HarvestModel();

        // Check if the product with the given field_ID exists
        $jobs = $model->find($harvest_id);

        if ($jobs) {
            // Delete the jobs from the database
            $model->delete($harvest_id);

            // Redirect back to the jobs list with a success message
            return redirect()->to('/harvest')->with('success', 'Harvest deleted successfully');
        } else {
            // Redirect back to the jobs list with an error message if the jobs doesn't exist
            return redirect()->to('/harvest')->with('error', 'harvest not found');
        }
    }
}
