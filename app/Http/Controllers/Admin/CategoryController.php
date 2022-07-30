<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\StorePostRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\Category\CategoryService;

class CategoryController extends Controller
{
    //
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        # code...
        $this->categoryService = $categoryService;
    }
    public function index()
    {

        $catePaginate = Category::select('id', 'name', 'image', 'description', 'active')
            ->paginate(3);
        return view('admin.categories.index',['category'=> $catePaginate]);
    }
    public function create()
    {
        $this->data['errorMsg'] =' Thêm lỗi ';
        return view('admin.categories.add',$this->data,[
        ]);

    }

    public function store(StorePostRequest $request)
    {
        $this->categoryService->create($request);
        return redirect()->back();
    }
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function changeStatus($category)
    {
        # code...
        $category = Category::find($category);
        if($category->active == 1){
            $category->active = 0;
        }else {
            # code...
            $category->active = 1;

        }
        $category->save();
        return redirect()->route('category');
    }
    public function update(StorePostRequest $request,$category)
    {
        $this->categoryService->update($request,$category);
        return redirect()->back();
    }



    public function delete(Request $request,Category $category)
    {
       if($category){
        $product = Product::where('category_id', '=', $category->id)->get();
        $productIds = $product->pluck('id');
        Product::whereIn('id', $productIds)->update(['category_id' => 0]); // update các post có id trong mảng
        $category->delete();
        return redirect()->back();
       }
    }
}
