<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
        public function index()
    {
        $category = Category::all();
        return view('backend.category', compact('category'));
    }
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.show', compact('category'));
    }
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route("category")->with("message", "Deleted successfully");
    }
    public function create()
    {
        return view("backend.category.create");
    }
    public function store(Request $request)
    {
        Category::create([
            "name" =>$request->name,
        ]);
        return redirect()->route("category")->with("message", "Creeted successfully");
    }
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', ["result" => $category]);
    }
    public function update(Request $request)
    {
        $old_id = $request->old_id;
        $category = Category::findOrFail(id: $old_id);
        $category->update([
            "name" => $request->name,
        ]);
        return redirect()->route("category")->with("message", "updated successfuly");
    }
}
