<?php

namespace App\Http\Controllers;

use App\DataTables\additionalMenueDataTable;
use App\Models\additionalMenue;
use App\Http\Requests\UpdateadditionalMenueRequest;
use Illuminate\Http\Request;

class AdditionalMenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(additionalMenueDataTable $dataTables)
    {
        return $dataTables->render('admin.pages.additional_menue.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.additional_menue.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Data Validate
        $request->validate([
            'name_arabic' => ['required'],
            'name_english' => ['required'],
            'price' => ['required'],
        ]);
    
        
        // Create the category record with the image path
        additionalMenue::create([
            'name_arabic' => $request->input('name_arabic'),
            'name_english' => $request->input('name_english'),
            'price' => $request->input('price'),
        ]);
    
        $notification = array(
            'message' => 'Category Created Successfully!!',
            'alert-type' => 'success',
        );
    
        return redirect()->route('additional_menue_admin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(additionalMenue $additionalMenue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(additionalMenue $additionalMenue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadditionalMenueRequest $request, additionalMenue $additionalMenue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(additionalMenue $additionalMenue)
    {
        //
    }
}
