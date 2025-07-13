<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->get(); // يجيب المنتجات مع الكاتيجوري
        return view('backend.product', compact('product'));
    }

    // عرض الفورم الخاص بإنشاء منتج جديد
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create', compact('categories'));
    }

    // حفظ المنتج الجديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('product')->with('message', 'Product created successfully');
    }

    // عرض منتج معين (مش إجباري لو مش بتحتاجي تعرضه لوحده)
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('backend.product.show', compact('product'));
    }

    // عرض صفحة التعديل
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('backend.product.edit', compact('product', 'categories'));
    }

    // تنفيذ التحديث
    public function update(Request $request)
    {
        $old_id = $request->old_id;

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($old_id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('product')->with('message', 'Product updated successfully');
    }
    // حذف المنتج
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product')->with('message', 'Product deleted successfully');
    }
}
