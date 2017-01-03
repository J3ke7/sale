<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductUpdateRequest;

use App\Product;
use App\Category;
use Lang;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(config('view.paginate'));

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductAddRequest $request)
    {
        $data = $request->only('name', 'code', 'image', 'price', 'quantity',
            'local', 'description', 'category_id');
        
        $file = $data['image'];
        $data['image'] = $file->getClientOriginalName();
        $file->move('upload/images', $file->getClientOriginalName());

        Product::create($data);

        return redirect()->route('admin.product.index')->with([
            'flash_level' => Lang::get('admin.success'),
            'flash_message' => Lang::get('admin.message.add_success')
        ]);
    }

    public function edit($id)
    {
        $categories = Category::pluck('name', 'id')->all();
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'Product'])
            ]);
        }

        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'Product'])
            ]);
        }
        $data = $request->only('name', 'code', 'image', 'price', 'quantity',
            'local', 'description', 'category_id');

        $file = $data['image'];
        if ($file) {
            $data['image'] = $file->getClientOriginalName();
            $file->move('upload/images', $file->getClientOriginalName());
        } else {
            unset($data['image']);
        }

        $product->update($data);

        return redirect()->route('admin.product.index')->with([
            'flash_level' => Lang::get('admin.success'),
            'flash_message' => Lang::get('admin.message.add_success')
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'Product'])
            ]);
        }
        unlink('upload/images/'.$product['image']);
        $product->delete();

        return redirect()->route('admin.product.index')->with([
            'flash_level' => Lang::get('admin.success'),
            'flash_message' => Lang::get('admin.message.add_success')
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::search($search)->paginate(config('view.paginate'));

        return view('admin.product.index', compact('products'));
    }
}
