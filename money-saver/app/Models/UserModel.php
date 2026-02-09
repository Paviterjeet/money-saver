<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = false;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'id',
        'email',
        'password',
        'currency',
        'created_at',
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';

    // 🔥 THIS WAS MISSING
    protected $beforeInsert = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash(
            $data['data']['password'],
            PASSWORD_DEFAULT
        );

        return $data;
    }
}
