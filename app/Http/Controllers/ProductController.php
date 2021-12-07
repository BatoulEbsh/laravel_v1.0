<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use  GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=$request->all();
        $validator = Validator::make($product, [
            'name' => 'required',
            'image'=>'required',
            'EndDate'=>'required',
            'contact'=>'required',
            'cat_Id'=>'required',
            'quantity'=>'required',
            'price' => 'required',
            'dis1' => 'required',
            'dis2' => 'required',
            'dis3' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->returnError(401, $validator->errors());
        }
        $product=Product::create($product);
        return $this->returnData("Product",$product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function show($id)
    {
        $product= Product::find($id);
        if (is_null($product)) {
            return $this->returnError(404, 'notfound');
        }
        return $this->returnData('show',$product,'success');
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
     * @return array
     */
    public function destroy($id)
    {
        $product= Product::find($id);
        $product->delete();
        return $this->returnSuccessMessage("asassa");
    }
}
