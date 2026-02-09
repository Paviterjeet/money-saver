<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\SavingsModel;
class Savings extends BaseController
{
    public function index()
    {
        helper("text");

        $session = session();
        $userModel = new UserModel();
        $savingsModel = new SavingsModel();

        // 1️⃣ Create guest user if not exists
        if (!$session->has("user_id")) {
            $uuid = random_string("crypto", 16);

            $userModel->insert([
                "id" => $uuid,
                "currency" => "INR",
            ]);

            $session->set("user_id", $uuid);
        }

        // 2️⃣ Always get user_id from session
        $userId = $session->get("user_id");

        // 3️⃣ Get TOTAL amount (SUM)
        $row = $savingsModel
            ->selectSum("amount")
            ->where("user_id", $userId)
            ->first();

        $total = $row["amount"] ?? 0;

        // 4️⃣ Pass data to view PROPERLY
        return view("home", [
            "total" => $total,
        ]);
    }

    public function add()
    {
        $userId = session()->get("user_id");

        if (!$userId) {
            return redirect()->to("/");
        }

        $amount = (float) $this->request->getPost("amount");

        if ($amount <= 0) {
            return redirect()
                ->back()
                ->with("error", "Invalid amount");
        }

        $model = new SavingsModel();

        $last = $model
            ->where("user_id", $userId)
            ->orderBy("id", "DESC")
            ->first();

        $previousTotal = $last["total_amount"] ?? 0;
        $newTotal = $previousTotal + $amount;

        $model->insert([
            "user_id" => $userId,
            "amount" => $amount,
            "total_amount" => $newTotal,
            "created_at" => date("Y-m-d H:i:s"),
        ]);
        if (floor($previousTotal / 1000) < floor($newTotal / 1000)) {
            session()->setFlashdata(
                "milestone",
                "🎉 Milestone reached! ₹" . floor($newTotal / 1000) * 1000
            );
        }

        return redirect()
            ->back()
            ->with("success", "Saving added successfully");
    }
    public function analytics()
{
    if (!session()->get('user_id')) {
        return redirect()->to('/');
    }

    $userId = session()->get('user_id');
    $model  = new SavingsModel();

    $monthlyTotal = $model->getMonthlyTotal($userId);
    $dailySavings = $model->getDailySavingsThisMonth($userId);

    $now = new \DateTime();

$thisMonth = $model->getMonthTotal(
    $userId,
    $now->format('m'),
    $now->format('Y')
);

$lastMonth = $model->getMonthTotal(
    $userId,
    $now->modify('-1 month')->format('m'),
    $now->format('Y')
);
$yearly = $model->getYearlySummary($userId);


    return view('analytics', [
        'monthlyTotal' => $monthlyTotal,
        'dailySavings' => $dailySavings,
        'thisMonth' => $thisMonth,
        'lastMonth' => $lastMonth,
        'yearly' => $yearly
    ]);


}
public function exportPdf()
{
    $userId = session()->get('user_id');
    $model  = new SavingsModel();

    $total = $model->getMonthlyTotal($userId);
    $daily = $model->getDailySavingsThisMonth($userId);

    $html = view('analytics_pdf', [
        'total' => $total,
        'daily' => $daily
    ]);

    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->render();
    $dompdf->stream("Monthly_Savings_Report.pdf");
}


}
