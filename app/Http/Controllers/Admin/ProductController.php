<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Product $productModel)
    {
        $this->product = $productModel;
    }


    public function index()
    {
        $product = $this->product::all();

        return view('product.product-index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.product-index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'PR_NAME' => ['required', 'string', 'max:255'],
            'PR_PRICE'=> ['required', 'string','max:255'],
            'PR_STOCK'=> ['required', 'string', 'max:255'],
            'PR_COLOR'=> ['required', 'string', 'max:255'],
            'PR_TYPE'=> ['required', 'string', 'max:255'],
            'PR_PIC'=> ['required'],
        ]);
        $product = Product::create($validated_data);
        $get_image = $request->PR_PIC;
        if ($get_image) {
            $path = 'images/product/' . $product->PR_PIC;
            if (file_exists($path)) {
                @unlink($path);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'images/Product/';
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->PR_PIC = $path . $new_image;
        }
        $product->save();

        return redirect()->route(('product-index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->findOrFail($id);
        return view('product.edit-index',compact('product'));

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
        $validated_data = $request->validate([
            'PR_NAME' => ['required', 'string', 'max:255'],
            'PR_PRICE'=> ['required', 'string','max:255'],
            'PR_STOCK'=> ['required', 'string', 'max:255'],
            'PR_COLOR'=> ['required', 'string', 'max:255'],
            'PR_TYPE'=> ['required', 'string', 'max:255'],
            'PR_PIC'=> ['required'],
        ]);
        $product = $this->product->findOrFail($id);
        $product->update($validated_data);

        //Upload image
        $get_image = $request->PR_PIC;
        if ($get_image) {
            $path = 'images/product/' . $product->PR_PIC;
            if (file_exists($path)) {
                @unlink($path);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'images/product/';
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->PR_PIC = $path . $new_image;
        }
        $product->save();

        return redirect()->route('product-index')->with('status', 'Completed !');
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->findOrfail($id);
        return view('product.delete', compact('product'));

    }
    public function delete($id)
    {
        $product = $this->product->findOrfail($id);
        $product->delete();
        return redirect()->route('product-index');
    }

}
