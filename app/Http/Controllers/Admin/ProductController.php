<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Gallery;
use App\Models\Category;
use App\Http\Services\Product\ProductAdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        ->where('categories.active', '=', 1)
        ->select('products.*')
        // ->search()
        ->orderBy('products.id', 'ASC')->Paginate(4);
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
        $category = Category::where('active', 1)->get();
        // lay ra danh sach category dc active 
        return view('admin.products.add',[
            'products' => $product,
            'categories' => $category
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
        try {
            $product = new Product();
            $product->fill($request->all());
            if ($product) {
                if ($product->image != null) {
                    if ($request->hasFile('image')) {
                        $image = $request->image;
                        $imageName = $image->hashName();
                        $imageName = $request->name . '_' . $imageName;
                        $product->image = $image->storeAs('images/products', $imageName);
                        $product->price_old = filter_var($request->price_old, FILTER_SANITIZE_NUMBER_INT);
                        $product->price_new = filter_var($request->price_new, FILTER_SANITIZE_NUMBER_INT);
                        $product->save();
                    }
                }
            }
             $productId =  $product->id;
            if ($request->hasFile('gallery')) {
                foreach ($request->gallery as $file) {
                    $imageNew = new Gallery();
                    if(isset($file)){
                        $imageNew->gallery = $file->hashName();
                        $imageNew->product_id = $productId;
                        // $imageNew = $file->storeAs('images/products', $imageNew);
                        $file->move('images/products',$file->hashName());
                        $imageNew->save();
                    }
                }
            }
            Session::flash('success', 'Tạo mới thành công');
            return redirect()->route('product');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Product $product)
    {
       
        $category = Category::where('active', 1)->get();
        return view('admin.products.edit',[
            'product'=> $product,
            'categories' => $category
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
        try {
            $product->fill($request->all());
            if ($product) {
                if ($product->image != null) {
                    if ($request->hasFile('image')) {
                        $image = $request->image;
                        $imageName = $image->hashName();
                        $imageName = $request->name . '_' . $imageName;
                        $product->image = $image->storeAs('images/product', $imageName);
                    } 
                }
            }
            $product->save();
            Session::flash('success', 'Cập Nhật thành công');
            return redirect()->route('product');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi khi cập nhật');
            return redirect()->back();
        }
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request = Product::destroy($id);
        return redirect()->back();
        // // dd($products);
        // if($products){
        //     $order = Order::where('product_id', '=', $products)->get();
        //     $productIds = $products->pluck('id');
        //     Order::whereIn('id', $productIds)->update(['product_id' => 0]); // update các post có id trong mảng
        //     $product->delete();
            
        //     return redirect()->back();
        //    }

        
    }

    // public function delete(Request $request,Category $category)
    // {
    //    if($category){
    //     $product = Product::where('category_id', '=', $category->id)->get();
    //     $productIds = $product->pluck('id');
    //     Product::whereIn('id', $productIds)->update(['category_id' => 0]); // update các post có id trong mảng
    //     $category->delete();
    //     return redirect()->back();
    //    }
    // }

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
