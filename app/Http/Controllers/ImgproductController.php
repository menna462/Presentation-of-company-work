<?php

namespace App\Http\Controllers;

use App\Models\Imgproduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ImgproductController extends Controller
{
        public function index()
    {
    $imgproduct = Imgproduct::all();
    return view('backend.imgproduct', compact('imgproduct'));
    }

  public function create()
  {
      $products = Product::all();
      return view("backend.imgproduct.create",compact('products'));
  }
  public function destroy(string $id)
    {
        $imgproduct = Imgproduct::findOrFail($id);
        $imgproduct->delete();
        return redirect()->route("imgproduct")->with("message", "Deleted successfully");
    }
    public function store(Request $request)
{
    // Validate input
    $request->validate([
        'images.*' => 'mimes:jpeg,png,jpg,gif,svg,mp4,webm,ogg,webp|max:10000',
        'product_id' => 'required|exists:products,id',
    ]);

    // Check if images uploaded
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('imges/products/'), $imageName);

            Imgproduct::create([
                'product_id' => $request->product_id,
                'image_path' => $imageName,
            ]);
        }
    }

    return redirect()->route('imgproduct')->with('message', 'Images uploaded successfully!');
}

public function edit(string $id)
    {
        $imgproduct = Imgproduct::findOrFail($id); // جلب الصورة المحددة بناءً على الـ id
        $products = Product::all();  // جلب جميع المنتجات

        return view("backend.imgproduct.edit",["result" => $imgproduct], compact( 'products'));
    }

    public function update(Request $request)
    {
        $old_id = $request->old_id;
        $imgproduct = Imgproduct::findOrFail($old_id);


        if ($request->hasFile("image_path")) {

            if ($imgproduct->image_path && file_exists(public_path('imges/products/' . $imgproduct->image_path))) {
                unlink(public_path('imges/products/' . $imgproduct->image_path));
            }

            $image = $request->file("image_path"); // استخدم file() لاستقبال الملف
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('imges/products/'), $imageName);

            $imgproduct->update([
                "product_id" => $request->product_id,
                "image_path" => $imageName,
            ]);
        } else {
            $imgproduct->update([
                "product_id" => $request->product_id,
            ]);
        }

        return redirect()->route("imgproduct")->with("message", "updated successfuly");
    }
}
