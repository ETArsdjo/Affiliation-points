<?php

namespace App\Http\Controllers;

use App\DataTables\productDataTable;
use App\Models\categories;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateproductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(productDataTable $dataTables)
    {
        return $dataTables->render('admin.pages.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=categories::all();

        return view('admin.pages.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Data Validate
        $request->validate([
            'category_id' => ['required'],
            'name_arabic' => ['required'],
            'name_english' => ['required'],
            'image' => ['required', 'image'],
            'product_descrption' => ['required'],
            'quantity' => ['required'],
            'price' => ['required'],
        ]);
        $imagePath = $request->file('image')->store('Affiliation-points.public.uploads'); // Assuming 'uploads' is your desired storage directory

    
        // Create the product record with the image path
        product::create([
            'category_id' => $request->input('category_id'),
            'name_arabic' => $request->input('name_arabic'),
            'name_english' => $request->input('name_english'),
            'product_descrption' => $request->input('product_descrption'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'image' => $imagePath,

        ]);
    
        $notification = array(
            'message' => 'Product Created Successfully!!',
            'alert-type' => 'success',
        );
    
        return redirect()->route('product_admin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
