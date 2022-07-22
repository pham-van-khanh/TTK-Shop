<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\StorePostRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
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
            // ->cursorPaginate(5);
            ->paginate(5);
        return view('admin.categories.index',['category'=> $catePaginate]);
    }
    public function create()
    {
        $this->data['errorMsg'] =' Thêm lỗi ';
        return view('admin.categories.add',$this->data,[
            'categories' => $this->categoryService->getParent()
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


    public function update(StorePostRequest $request,$id)
    {
        $this->categoryService->edit($request,$id);
        return redirect()->back();
    }
    public function delete(Request $request,$id)
    {
        $request = Category::destroy($id);
         return redirect()->back();
    }
}
