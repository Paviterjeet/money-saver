<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Database;
class TestDb extends BaseController
{
    public function index()
    {
        
       $db = Database::connect();

        if ($db->connect_errno) {
            return "Database connection failed ❌";
        }

        return "Database connected successfully ✅";
    }
}
