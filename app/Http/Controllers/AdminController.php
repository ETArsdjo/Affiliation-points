<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Models\categories;
use App\Models\Sale;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function homeDashboard()
{
    // Fetch user counts for the current year
    $labels = [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];
    $data = array_fill(0, 12, 0);
    $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->get();
    foreach ($users as $user) {
        $monthIndex = $user->month - 1;
        $data[$monthIndex] = $user->count;
    }

    // Fetch category sales data
    $categories = categories::all();
    $salesData = [];
    
    foreach ($categories as $category) {
        $totalSalesAmount = Sale::where('category_id', $category->id)
            ->sum(\DB::raw('amount * quantity'));
            
        $salesData[] = [
            'category' => $category->type,
            'total_sales_amount' => $totalSalesAmount,
        ];
    }
    
    $labels2 = collect($salesData)->pluck('category');
    $data2 = collect($salesData)->pluck('total_sales_amount');
    

     // Retrieve users along with their total points 
     $users = User::with('points')->get();

     // Prepare data for the chart
     $labelsUser = $users->pluck('name'); // Assuming 'name' is the user attribute you want to use as labels
     $dataPoint = $users->pluck('points')->map->sum('points'); // Sum the points for each user

        
     //persent 
     
    $maleCount = User::where('gender', 'male')->count();
    $femaleCount = User::where('gender', 'female')->count();
    
    $total = $maleCount + $femaleCount;
    
    $malePercentage = ($total > 0) ? ($maleCount / $total) * 100 : 0;
    $femalePercentage = ($total > 0) ? ($femaleCount / $total) * 100 : 0;
    
    

    return view('admin.index', compact('data', 'labels', 'data2', 'labels2','labelsUser','dataPoint','malePercentage', 'femalePercentage'));
}


    // public function userChart()
    // {
    //     // Initialize labels and data arrays for all months of the year
    //     $labels = [
    //         "Jan",
    //         "Feb",
    //         "Mar",
    //         "Apr",
    //         "May",
    //         "Jun",
    //         "Jul",
    //         "Aug",
    //         "Sep",
    //         "Oct",
    //         "Nov",
    //         "Dec", ];
    //     $data = array_fill(0, 12, 0);

    //     // Fetch user counts for the current year
    //     $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
    //         ->whereYear('created_at', date('Y'))
    //         ->groupBy('month')
    //         ->get();

    //     // Populate data array with user counts for existing months
    //     foreach ($users as $user) {
    //         $monthIndex = $user->month - 1; // Adjust month index to start from 0
    //         $data[$monthIndex] = $user->count;
    //     }

    //     return view('admin.index', compact('data', 'labels'));
    // }
    // public function categorySalesChart()
    // {
    //     // Retrieve all categories
    //     $categories = categories::all();

    //     // Initialize an empty array to store sales data
    //     $salesData = [];

    //     // Loop through each category to fetch its sales count
    //     foreach ($categories as $category) {
    //         $salesCount = Sale::where('category_id', $category->id)->count();
    //         // Push the sales count along with the category name into the sales data array
    //         $salesData[] = [
    //             'category' => $category->type,
    //             'sales_count' => $salesCount,
    //         ];
    //     }

    //     // Prepare the data for the chart
    //     $labels2 = collect($salesData)->pluck('category');
    //     $data2 = collect($salesData)->pluck('sales_count');

    //     // Pass the data to the view
    //     return view('admin.index', compact('labels2', 'data2'));
    // }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreadminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminRequest $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
}
