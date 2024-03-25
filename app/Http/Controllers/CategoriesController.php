<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriDataTable;
use App\Models\branch;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatecategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriDataTable $dataTables)
    {
        return $dataTables->render('admin.pages.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.create' );
    }
    public function store(Request $request)
    {
        // Data Validate
        $request->validate([
            'type' => ['required'],
            'price' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Adjust validation rules as needed
            'note' => ['required'],
        ]);
    
        // Handle file upload
        $imagePath = $request->file('image')->store('uploads'); // Assuming 'uploads' is your desired storage directory
    
        // Create the category record with the image path
        categories::create([
            'type' => $request->input('type'),
            'price' => $request->input('price'),
            'image' => $imagePath,
            'note' => $request->input('note'),
        ]);
    
        $notification = array(
            'message' => 'Category Created Successfully!!',
            'alert-type' => 'success',
        );
    
        return redirect()->route('category_admin.index')->with($notification);
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = categories::findOrFail($id);
        return view('admin.pages.category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => ['required'],
            'price' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Adjust validation rules as needed
            'note' => ['required'],
        ]);
    
        $category = categories::findOrFail($id);
    
        $category->type = $request->type;
        $category->price = $request->price;
        $category->image = $request->image;
        $category->note = $request->note;

    
        $category->save();
    
        $notification = array(
            'message' => 'Category Updated Successfully!!',
            'alert-type' => 'success',
        );
    
        return redirect()->route('category_admin.index')->with($notification);
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
