<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Controller;

class MainModel extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'eid';
    protected $allowedFields = [
        'fname',
        'mname',
        'lname',
        'gender',
        'mail',
        'mobile_no',
        'date_of_birth',
        'photograph',
        'status'
    ];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
