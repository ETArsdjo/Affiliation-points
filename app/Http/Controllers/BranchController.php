<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\DataTables\BranchDataTable;
use App\Http\Requests\StorebranchRequest;
use App\Http\Requests\UpdatebranchRequest;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BranchDataTable $dataTables)
    {
        return $dataTables->render('admin.pages.branches.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.branches.create' );
    }
    public function store(Request $request)
    {
        
        // Data Validate
        $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'number' => ['required', 'string'],

        ]);

        branch::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'number' => $request->input('number'),

        ]);
        

        $notification = array(
            'message' => 'Branch Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('branch_admin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $branch = branch::findOrFail($id);
        return view('admin.pages.branches.edit', compact('branch'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'number' => ['required', 'string'],

        ]);
    
        // Retrieve the branch by ID
        $branch = branch::findOrFail($id);
    
        // Update the branch details
        $branch->name = $request->name;
        $branch->address = $request->address;
        $branch->number = $request->number;
    
        // Save the updated user details
        $branch->save();
    
        $notification = array(
            'message' => 'Branch Updated Successfully!!',
            'alert-type' => 'success',
        );
    
        return redirect()->route('branch_admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $branch = branch::findOrFail($id);
            $branch->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);}
            catch  (\Exception $e) {
                Log::error("Error deleting user: {$e->getMessage()}");
            }
    }
}
