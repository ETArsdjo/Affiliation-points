<?php 
namespace App\Http\Controllers;

use App\DataTables\CategoriDataTable;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import Log facade

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
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
$request->validate([
            'name_arabic' => ['required'],
            'name_english' => ['required'],
            'image' => ['required', 'image'], 
        ]);

$imagePath = $request->file('image')->store('public/category_images');

           $category = categories::create([
            'name_arabic' => $request->input('name_arabic'),
            'name_english' => $request->input('name_english'),
            'image' => $imagePath
        ]);

return redirect()->route('category_admin.index')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {
           $request->validate([
            'name_arabic' => ['required'],
            'name_english' => ['required'],
            'image' => ['image'], 
        ]);
        $category = categories::findOrFail($id);
        $category->name_arabic = $request->name_arabic;
        $category->name_english = $request->name_english;

if ($request->hasFile('image')) {
            
            $imagePath = $request->file('image')->store('public/category_images');
            $category->image = $imagePath; 
        }

$category->save();

        
        return redirect()->route('category_admin.index')->with('success', 'Category updated successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = categories::findOrFail($id);
        return view('admin.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $category = categories::findOrFail($id);
            $category->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            Log::error("Error deleting category: {$e->getMessage()}");
            return response(['status' => 'error', 'message' => 'Something went wrong while deleting category.']);
        }
    }
}
