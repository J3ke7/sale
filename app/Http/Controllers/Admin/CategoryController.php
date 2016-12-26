<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Category;
use Lang;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(config('view.paginate'));

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryAddRequest $request)
    {
        $data = $request->only('name');
        Category::create($data);

        return redirect()->route('admin.category.index')->with([
            'flash_level' => Lang::get('admin.success'),
            'flash_message' => Lang::get('admin.message.add_success')
        ]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'Category'])
            ]);
        }

        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'Category'])
            ]);
        }
        $data = $request->only('name');
        $category->update($data);

        return redirect()->route('admin.category.index')->with([
            'flash_level' => Lang::get('admin.success'),
            'flash_message' => Lang::get('admin.message.update_success')
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'Category'])
            ]);
        }
        $category->delete();
        
        return redirect()->route('admin.category.index')->with([
            'flash_level' => Lang::get('admin.success'),
            'flash_message' => Lang::get('admin.message.delete_success')
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $categories = Category::searchByName($search)->paginate(config('view.paginate'));

        return view('admin.category.index', compact('categories'));
    }
}
