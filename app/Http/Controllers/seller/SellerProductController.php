<?php

namespace App\Http\Controllers\seller;


use App\Models\User;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;
use App\Transformers\ProductTransformer;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\HttpException;


class SellerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $products = $seller->products;
                
                 return $this->showAll($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,User $seller)
    {
        $rules = [
            'name'=>'required',
            'description' => 'required',
            'quantity'=>'required|integer|min:1',
            'image' => 'required|image',
        ];

        $this->validate($request,$rules);

        $data = $request->all();
        $data['status'] = Product::UNAVLABLE_PRODUCT;
       // $request->image->store('');
        $data['image'] = '1.jpg';
        $data ['seller_id'] = $seller->id;

        $product =Product::create($data);

        return $this->showOne($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, seller $seller ,Product $product)
    {
        $rules =[
            'quantity' => 'integer|min:1',
            'status' => 'in:' . Product::AVAILABLE_PRODUCT . ',' . Product::UNAVAILABLE_PRODUCT,
            'image' => 'image',
        ];

        $this->validate($request , $rules);
        $this->checkSeller($seller,$product);

        $product->fill($request->only([
            'name',
            'description',
            'quantity',
        ]));

        if ($request->has('status')) {
            $product->status = $request->status;

            if ($product->isAvailable() && $product->categories()->count() == 0) {
                return $this->errorResponse('An Active Product must have at least one Category' , 422);
            }
        }
        if ($product->isClean()) {
            return $this->errorResponse('You need to specify a diffrent value to update' , 422);
        }

        $product->save();

        return $this->showOne($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(seller $seller ,Product $product)
    {
        
        $this->checkSeller($seller, $product);

        $product->delete();
        Storage::delete($product->image);

        return $this->showOne($product);
    }

    protected function checkSeller (Seller $seller , Product $product)
    {
        if ($seller->id != $product->seller_id ) {
            throw new HttpException(422 , 'This specified seller is not the actual Seller of the Product');
        }
    }
}
