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
        // Retrieve the employee by ID
        $employee = Employee::findOrFail($id);
        
        // Assuming you need to pass additional data like branches and users
        $branches = Branch::all();
        $users = User::where('role', 'employee')->get();
        
        // Return the view with the employee data and additional data
        return view('admin.pages.employee.edit', compact('employee', 'branches', 'users'));
    }
    
    


    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => ['required'],
            'branch_id' => ['required'],
        ]);
    
        // Retrieve the employee by ID
        $employee = Employee::findOrFail($id);
    
        // Update the employee details
        $employee->employee_id = $request->employee_id;
        $employee->branch_id = $request->branch_id;
    
        // Save the updated employee details
        $employee->save();
    
        $notification = [
            'message' => 'Employee Updated Successfully!!',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('employee_admin.index')->with($notification);
    }
    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            Log::error("Error deleting employee: {$e->getMessage()}");
            return response(['status' => 'error', 'message' => 'Failed to delete employee.']);
        }
    }
        
}
