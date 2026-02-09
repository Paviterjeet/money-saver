<?php

namespace App\Controllers;

use App\Models\SavingsModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
{
    helper('text');

    $session      = session();
    $userModel    = new UserModel();
    $savingsModel = new SavingsModel();

    // Ensure user exists
    if (!$session->has('user_id')) {
        $uuid = random_string('crypto', 16);

        $userModel->insert([
            'id'       => $uuid,
            'currency' => 'INR'
        ]);

        $session->set('user_id', $uuid);
    }

    $userId = $session->get('user_id');

    // Total savings
    $row = $savingsModel
        ->selectSum('amount')
        ->where('user_id', $userId)
        ->first();

    $total = $row['amount'] ?? 0;

    // Last 5 savings
    $history = $savingsModel
        ->where('user_id', $userId)
        ->orderBy('created_at', 'DESC')
        ->limit(5)
        ->find();

    $milestoneSize = 1000;

// How much crossed
$currentBlockAmount = $total % $milestoneSize;

// If exactly on milestone (1000, 2000, 3000…)
if ($currentBlockAmount == 0 && $total != 0) {
    $progress = 100;
    $nextMilestone = $total + $milestoneSize;
} else {
    $progress = ($currentBlockAmount / $milestoneSize) * 100;
    $nextMilestone = (floor($total / $milestoneSize) + 1) * $milestoneSize;
}

$progress = round($progress);

    return view('dashboard', [
        'total'         => $total,
        'history'       => $history,
        'nextMilestone' => $nextMilestone,
        'progress'      => min(100, round($progress))
    ]);
}

}
