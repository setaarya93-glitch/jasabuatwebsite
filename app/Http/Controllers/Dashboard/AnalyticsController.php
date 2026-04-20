<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UmkmTrend;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Show only latest trends by default
        $trends = UmkmTrend::where('is_latest', true)->orderBy('score_value', 'desc')->get();
        $batch_name = $trends->first()->batch_name ?? 'N/A';
        return view('dashboard.analytics.index', compact('trends', 'batch_name'));
    }

    public function history()
    {
        // Get unique batches
        $batches = UmkmTrend::select('batch_name', 'created_at')
            ->groupBy('batch_name', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('dashboard.analytics.history', compact('batches'));
    }

    public function show(Request $request)
    {
        $batch_name = $request->query('batch');
        $trends = UmkmTrend::where('batch_name', $batch_name)->orderBy('score_value', 'desc')->get();
        return view('dashboard.analytics.index', compact('trends', 'batch_name'));
    }

    public function refresh()
    {
        // Mark current latest as old
        UmkmTrend::where('is_latest', true)->update(['is_latest' => false]);

        // Get the "current" trends to base the new prediction on
        $oldTrends = UmkmTrend::orderBy('created_at', 'desc')->take(5)->get();
        
        $newBatchName = "Pekan ke-" . (UmkmTrend::distinct('batch_name')->count() + 1);
        
        foreach ($oldTrends as $trend) {
            // Simulate weekly fluctuation
            $fluctuation = rand(-8, 12); // Market bias slightly upwards
            $newScore = max(10, min(98, $trend->score_value + $fluctuation));
            
            $growthFluctuation = rand(-3, 6);
            $newGrowthInt = (int)filter_var($trend->growth_percentage, FILTER_SANITIZE_NUMBER_INT) + $growthFluctuation;
            $newGrowth = "+" . max(5, $newGrowthInt) . "%";

            // Determine textual score
            $newTextScore = "Tinggi";
            if($newScore >= 90) $newTextScore = "Sangat Tinggi";
            elseif($newScore >= 70) $newTextScore = "Tinggi";
            elseif($newScore >= 50) $newTextScore = "Sedang";
            else $newTextScore = "Rendah";

            UmkmTrend::create([
                'category' => $trend->category,
                'trend_name' => $trend->trend_name,
                'growth_percentage' => $newGrowth,
                'score_value' => $newScore,
                'website_need_score' => $newTextScore,
                'website_features' => $trend->website_features,
                'description' => $trend->description,
                'batch_name' => $newBatchName,
                'is_latest' => true
            ]);
        }

        return redirect()->route('dashboard.analytics.index')->with('success', "Analisis pasar baru ($newBatchName) telah digenerate!");
    }
}
