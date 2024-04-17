<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function userChart()
    {
        // Initialize labels and data arrays for all months of the year
        $labels = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec", ];
        $data = array_fill(0, 12, 0);

        // Fetch user counts for the current year
        $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->get();

        // Populate data array with user counts for existing months
        foreach ($users as $user) {
            $monthIndex = $user->month - 1; // Adjust month index to start from 0
            $data[$monthIndex] = $user->count;
        }

        return view('chart', compact('data', 'labels'));
    }



    public function userPointsChart()
    {
        // Retrieve users along with their total points
        $users = User::with('points')->get();

        // Prepare data for the chart
        $labels = $users->pluck('name'); // Assuming 'name' is the user attribute you want to use as labels
        $data = $users->pluck('points')->map->sum('points'); // Sum the points for each user

        // Render the chart view with the data
        return view('chart', compact('labels', 'data'));
    }

    public function genderChart()
{
    $maleCount = User::where('gender', 'male')->count();
    $femaleCount = User::where('gender', 'female')->count();
    
    $total = $maleCount + $femaleCount;
    
    $malePercentage = ($total > 0) ? ($maleCount / $total) * 100 : 0;
    $femalePercentage = ($total > 0) ? ($femaleCount / $total) * 100 : 0;
    
    return view('chart', compact('malePercentage', 'femalePercentage'));
}
}
