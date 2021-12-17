<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
    public function sortDate($date1,$date2,$date3){
        $date =[
           'date1'=> $date1,
            'date2'=> $date2,
            'date3'=> $date3
        ];
        $sorted = $date->sortBy('date')->values()->all();
        return $this->returnData('sort',$sorted);
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
            'date1'=>'required',
            'date2'=>'required',
            'date3'=>'required',
            'dis1' => 'required', //sale1
            'dis2' => 'required',//sale2
            'dis3' => 'required'//sale3
        ]);

        if ($validator->fails()) {
            return $this->returnError(401, $validator->errors());
        }

       $dt1=$this->dateDiff($product['created_at'],$product['date1']);
        $dt2= $this->dateDiff($product['date1'],$product['date2']);
        $dt3= $this->dateDiff($product['date2'],$product['date3']);
        $dt = $this->dateDiff($product['created_at'],$product['endDate']);
        $sdt=$this->sortDate($product['date1'],$product['date2'],$product['date3']);
        echo $sdt;
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

        return Product::selecte('name','image');
    }

    /**
     *
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input=$request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'image'=>'required|image',
            'contact'=>'required',
            'cat_Id'=>'required',
            'quantity'=>'required',
            'price' => 'required',
            'r1'=>'required',//range1
            'r2'=>'required',//range2
            'date1'=>'required',
            'date2'=>'required',
            'date3'=>'required',
            'dis1' => 'required', //sale1
            'dis2' => 'required',//sale2
            'dis3' => 'required'//sale3
        ]);

        if ($validator->fails()) {
            return $this->returnError(401, $validator->errors());
        }
        $product->name=$input['name'];
        $product->image=$input['image'];
        $product->contact=$input['contact'];
        $product->cat_Id=$input['cat_Id'];
        $product->quantity=$input['quantity'];
        $product->price=$input['price'];
        $product->r1=$input['r1'];
        $product->r2=$input['r2'];
        $product->date1=$input['date1'];
        $product->date2=$input['date2'];
        $product->date3=$input['date3'];
        $product->dis1=$input['dis1'];
        $product->dis2=$input['dis2'];
        $product->dis3=$input['dis3'];
        $product->save();
        $input=Product::create($input);
        return $this->returnData("Product",$input);
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
