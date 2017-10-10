<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use Session;

use Image;

use Storage;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'slug' => 'required|alpha_dash|min:5|max:255',
            'price' => 'required|integer',
            'file' => 'sometimes|image'
        ]);

        //store data in variable
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->slug = $request->slug;

        //save image
        if($request->hasFile('image')) {
            //grab the file out of the request
            $image = $request->file('image');
            //rename file to make it unique (timestamp + extension)
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //set up a location to store the file
            $location = public_path('images/' . $filename);
            //save file with Image helper 'Intervention Image' plugin is used here
            Image::make($image)->resize(250, 250)->save($location);
            //save the filename to the database column ()
            $product->image = $filename;
        } else {
            $product->image = 'noimage.jpg';
        }

        $product->save();

        //push the flash message to a user
        Session::flash('success', 'The product was successfully saved!');

        // redirect to another page
        return redirect()->route('products.show', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
