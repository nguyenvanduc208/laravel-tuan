<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categoriesGet = Category::paginate(10);

        return view('category.index', ['categories' => $categoriesGet]);
    }

    public function add()
    {
        return view('category.create');
    }

    public function save(Request $request)
    {
        $validate = $request->validate(
            [
                'name' => 'required|unique:categories',
                'description' => 'required',
            ],
            [
                'name.required' => "Tên không được bỏ trống",
                'name.unique' => "Tên danh mục đã tồn tại",
                'description.required' => "Chi tiết không được bỏ trống"
            ]
        );
        if($request->has('id')){
            $model = Category::find($request->id);
        }else{
            $model = new Category();
        }
        $model->fill($request->all());
        $model->slug = Str::slug($request->name);
        $model->save();

        return redirect(route('cate-index'));
    }

    public function edit(Category $category){
        return view('category.create', compact('category'));
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect(route('cate-index'))->with('status', 'delete');
    }
}
