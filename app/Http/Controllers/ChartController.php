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
}
