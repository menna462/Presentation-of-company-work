<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // تم تضمينها بالفعل، لا تغيير هنا.

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $service = Service::all();
        return view('backend.service', compact('service'));
    }

    /**
     * Show the form for creating a new service.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("backend.service.create");
    }

    /**
     * Store a newly created service in storage.
     *
     * @param \Illuminate\Http\Request $request The incoming request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'paragraph' => 'nullable|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'paragraph' => $request->paragraph,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // *** التعديل هنا: نقل الصورة إلى مجلد المنتجات ***
            $image->move(public_path('imges/products/'), $imageName);

            // *** التعديل هنا: حفظ المسار الكامل في قاعدة البيانات مع مجلد المنتجات ***
            $data['image'] = 'imges/products/' . $imageName;
        }

        Service::create($data);
        return redirect()->route("service")->with("message", "Created successfully");
    }

    /**
     * Display the specified service.
     *
     * @param string $id The ID of the service to show
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view('backend.service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param string $id The ID of the service to edit
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('backend.service.edit', ["result" => $service]);
    }

    /**
     * Update the specified service in storage.
     *
     * @param \Illuminate\Http\Request $request The incoming request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $old_id = $request->old_id;
        $service = Service::findOrFail($old_id);

        $request->validate([
            'title' => 'required|min:3|max:255',
            'paragraph' => 'nullable|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'paragraph' => $request->paragraph,
        ];

        if ($request->hasFile('image')) {
            // احذف الصورة القديمة لو موجودة
            // المسار المحفوظ في قاعدة البيانات ($service->image) هو المسار الكامل من public
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            // خزّن الصورة الجديدة
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // *** التعديل هنا: نقل الصورة الجديدة إلى مجلد المنتجات ***
            $image->move(public_path('imges/products/'), $imageName);

            // *** التعديل هنا: حفظ المسار الكامل في قاعدة البيانات مع مجلد المنتجات ***
            $data['image'] = 'imges/products/' . $imageName;
        }

        $service->update($data);

        return redirect()->route('service')->with('message', 'Updated successfully');
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }
        $service->delete();
        return redirect()->route("service")->with("message", "Deleted successfully");
    }
}
