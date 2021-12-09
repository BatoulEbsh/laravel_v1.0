<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\This;

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
    function dateDiff($date1,$date2){
        $date = $this->dateDiff($date1,$date2);
        return $date->format('%R%a');
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
            'image'=>'required|image',
            'endDate'=>'required',
            'contact'=>'required',
            'cat_Id'=>'required',
            'quantity'=>'required',
            'price' => 'required',
            'r1'=>'required',//range1
            'r2'=>'required',//range2
            'dis1' => 'required', //sale1
            'dis2' => 'required',//sale2
            'dis3' => 'required'//sale3
        ]);

        if ($validator->fails()) {
            return $this->returnError(401, $validator->errors());
        }

       $dt=$this->dateDiff(now(),$product['endDate']);
        if ($dt>$product['r1']){
            $sale=$product['dis1'];
            return  $this->returnData('sale',$sale);
        }
        elseif ($dt>$product['r2'] && $dt<$product['r1']){
            $sale=$product['dis2'];
            return  $this->returnData('sale',$sale);
        }
        elseif ($dt<$product['r2']){
            $sale=$product['dis3'];
            return  $this->returnData('sale',$sale);
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

    public function showAllProducts(){

        return Product::all();
    }

    /**
     *
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
        return $this->returnSuccessMessage("product delete successfully");
    }
}
