<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Controller;

class AddressModel extends Model
{
    protected $table = 'address';
    protected $primarykey = 'aid';
    protected $allowedFields = [
     'employee_id',
     'add_line1', 
     'add_line2', 
     'Country', 
     'state', 
     'pincode'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
