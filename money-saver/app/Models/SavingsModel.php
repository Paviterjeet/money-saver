<?php

namespace App\Models;

use CodeIgniter\Model;

class SavingsModel extends Model
{
    protected $table = 'savings';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'amount',
        'note',
    ];

    protected $useTimestamps = true;

    public function getMonthlyTotal($userId)
{
    return $this->selectSum('amount')
        ->where('user_id', $userId)
        ->where('MONTH(created_at)', date('m'))
        ->where('YEAR(created_at)', date('Y'))
        ->first()['amount'] ?? 0;
}

public function getDailySavingsThisMonth($userId)
{
    return $this->select("DATE(created_at) as day, SUM(amount) as total")
        ->where('user_id', $userId)
        ->where('MONTH(created_at)', date('m'))
        ->where('YEAR(created_at)', date('Y'))
        ->groupBy('day')
        ->orderBy('day', 'ASC')
        ->findAll();
}
public function getMonthTotal($userId, $month, $year)
{
    return $this->selectSum('amount')
        ->where('user_id', $userId)
        ->where('MONTH(created_at)', $month)
        ->where('YEAR(created_at)', $year)
        ->first()['amount'] ?? 0;
}
public function getYearlySummary($userId)
{
    return $this->select("MONTH(created_at) as month, SUM(amount) as total")
        ->where('user_id', $userId)
        ->where('YEAR(created_at)', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->findAll();
}

}
