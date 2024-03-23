<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use App\Models\branch;
use App\Models\employee;
use App\Http\Requests\StoreemployeeRequest;
use App\Http\Requests\UpdateemployeeRequest;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EmployeeDataTable $dataTables)
    {
        return $dataTables->render('admin.pages.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = User::where('role', 'employee')->get();
        $branches = branch::all();


        return view('admin.pages.employee.create', compact('employees', 'branches') );
    }

    /**
     * Store a newly created resource in storage.
     */  public function store(Request $request)
    {
        
        // Data Validate
        $request->validate([
            'employee_id' => ['required'],
            'branch_id' => ['required'],
        ]);

        employee::create([
            'employee_id' => $request->input('employee_id'),
            'branch_id' => $request->input('branch_id'),
        ]);
        

        $notification = array(
            'message' => 'Branch Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('employee_admin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = employee::findOrFail($id);
        $employees = User::where('role', 'employee')->get();
        $branches = branch::all();
        return view('admin.pages.employee.edit', compact('employee','employees','branches'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => ['required'],
            'branch_id' => ['required'],

        ]);
    
        // Retrieve the branch by ID
        $employee = employee::findOrFail($id);
    
        // Update the branch details
        $employee->name = $request->employee_id;
        $employee->address = $request->branch_id;    
        // Save the updated user details
        $employee->save();
    
        $notification = array(
            'message' => 'Employee Updated Successfully!!',
            'alert-type' => 'success',
        );
    
        return redirect()->route('employee_admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $employee = employee::findOrFail($id);
            $employee->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);}
            catch  (\Exception $e) {
                Log::error("Error deleting employee: {$e->getMessage()}");
            }
    }
}
