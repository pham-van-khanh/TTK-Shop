<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Http\Services\Product\ProductAdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected  $productService;
     public function __construct(ProductAdminService $productService)
{
    $this->productService = $productService;
}

    public function index()
    {
        $products = Product::with('category')
        ->join('categories', 'products.category_id', '=', 'categories.id')
            
        // ->join('sizes', 'products.size_id', '=', 'sizes.id')
        ->where('categories.active', '=', 1)
            
        ->select('products.*')
        ->orderBy('products.id', 'ASC')->Paginate(6);
        // dd($products);
        return view('admin.products.index',[
         'products' => $products, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.products.add',[
            'products' => $product,
            'categories' => $this->productService->getCate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
        $this->productService->create($request);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        dd($product);
        return view('admin.products.edit',[
            'product'=> $product,
            'categories' => $this->productService->getCate()
        ]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,Product $product)
    {
        //
        $this->productService->update($request,$product);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request = Product::destroy($id);
        return redirect()->back();
    }
    public function changeStatus($product)
    {
        # code...
        $product = Product::find($product);
        if($product->active == 1){
            $product->active = 0;
        }else {
            # code...
            $product->active = 1;

        }
        $product->save();
        return redirect()->route('product');
    }
}
