<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\ProductSize;
use App\Size;
use App\Http\Requests\AddSizeRequest;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['product_size'] = ProductSize::where('product_id',$id)->get();
        $data['image'] = Image::select('slug')->where('product_id',$id)->where('status',1)->first();
        $data['sizes'] = Size::all();
        $data['id'] = $id;
        //dd($data['id']);
        
        return view('admin.product.viewProductSize',$data);
    }

    public function updateQuantity(Request $request){
        $id = $request->id;
        $product_size = ProductSize::find($id);
        $product_size->quantity = $request->qty;
        $product_size->save();
         return response()->json([], 400);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {   
        $data = $request->all();
        $data['product_id'] = $id;
        //dd($data);
        $size = ProductSize::create($data);
        if ($size) {
            return redirect()->back()->with('status','Thêm thành công!');
        }else{
            return redirect()->back()->with('status','Thêm thất bại!');
        }
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
        $size = ProductSize::destroy($id);
        if ($size) {
            return back()->with('status','Xóa kích thước thành công!');
        }else{
            return back()->with('status','Xóa kích thước thất bại!');
        }
    }
}