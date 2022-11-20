<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetail;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProductDetail $productdetailModel)
    {
        $this->detail = $productdetailModel;
    }


    public function index()
    {
        $detail = $this->detail::all();

        return view('product-detail.pd-index',compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-detail.pd-index');
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
        'PRD_TYPE' => ['required', 'string', 'max:255'],
    ]);

    $detail = ProductDetail::create($validated_data);


    $detail->save();
    return redirect()->route(('detail'));
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
        $detail = $this->detail->findOrFail($id);

        return view('product-detail.edit-index',compact('detail'));

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
            'PRD_TYPE' => ['required', 'string', 'max:255'],
        ]);
        $detail = $this->detail->findOrFail($id);
        $detail->update($validated_data);
        return redirect()->route('detail')->with('status', 'Completed !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = $this->detail->findOrfail($id);
    }

    public function delete($id)
    {
        $detail = $this->detail->findOrfail($id);
        $detail->delete();
        return redirect()->route('detail');
    }

}
