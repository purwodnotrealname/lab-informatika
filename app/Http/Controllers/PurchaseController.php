<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\BalanceTransaction;
use App\Models\PurchasedProject;
use App\Models\Work;

class PurchaseController extends Controller
{
    public function checkPurchaseStatus($project_id)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['purchased' => false]);
        }

        $purchased = PurchasedProject::where('user_id', $user->id)
            ->where('project_id', $project_id)
            ->exists();

        return response()->json([
            'purchased' => $purchased,
            'balance' => optional($user->balance)->amount ?? 0
        ]);
    }

    public function getProjectPrice($project_id)
    {
        $project = Work::findOrFail($project_id);
        return response()->json([
            'price' => $project->price,
            'balance' => optional(Auth::user()->balance)->amount ?? 0
        ]);
    }

    public function getCurrentBalance()
    {
        return response()->json([
            'balance' => optional(Auth::user()->balance)->amount ?? 0
        ]);
    }

    public function downloadProject($project_id)
    {
        $user = Auth::user();
        $project = Work::findOrFail($project_id);

        $purchased = PurchasedProject::where('user_id', $user->id)
            ->where('project_id', $project_id)
            ->exists();

        if (!$purchased) {
            abort(403, 'You must purchase this project before downloading');
        }

        $filePath = storage_path('app/public/showcase/source_code/' . $project->source_code);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->download($filePath);
    }

    public function purchaseProject(Request $request)
    {
        $request->validate([
            'project_id' => 'required|integer|exists:works,id', // Changed from 'projects' to 'works'
            'amount' => 'required|numeric|min:0',
        ]);

        $user = Auth::user();
        $amount = $request->amount;
        $projectId = $request->project_id;

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to purchase projects'
            ], 401);
        }

        // Verify the price matches the project's actual price
        $project = Work::findOrFail($projectId);
        if ($amount != $project->price) {
            return response()->json([
                'success' => false,
                'message' => 'Price mismatch detected'
            ], 400);
        }

        $balance = Balance::firstOrCreate(
            ['user_id' => $user->id],
            ['amount' => 0]
        );

        if ($balance->amount < $amount) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient balance to purchase this project',
                'balance' => $balance->amount
            ], 400);
        }

        // Process the purchase
        $balance->decrement('amount', $amount);

        BalanceTransaction::create([
            'user_id' => $user->id,
            'balance_id' => $balance->id,
            'transaction_type' => 'purchase',
            'amount' => -$amount,
            'reference_type' => 'ProjectPurchase',
            'reference_id' => $projectId,
            'metadata' => json_encode(['project_id' => $projectId]),
        ]);

        PurchasedProject::create([
            'user_id' => $user->id,
            'project_id' => $projectId,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Project purchased successfully',
            'balance' => $balance->amount
        ]);
    }
}