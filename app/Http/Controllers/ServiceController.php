<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::all();
        return view('backend.service', compact('service'));
    }

    public function create()
    {
        return view("backend.service.create");
    }

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
            $image->move(public_path('imges/services/'), $imageName);
            $data['image'] = 'imges/services/' . $imageName;
        }

        Service::create($data);
        return redirect()->route("service")->with("message", "Created successfully");
    }

    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view('backend.service.show', compact('service'));
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('backend.service.edit', ["result" => $service]);
    }

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
            // احذف القديمة لو موجودة
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            // خزّن الجديدة
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('imges/services/'), $imageName);
            $data['image'] = 'imges/services/' . $imageName;
        }

        $service->update($data);

        return redirect()->route('service')->with('message', 'Updated successfully');
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        // احذف الصورة لو موجودة
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }
        $service->delete();
        return redirect()->route("service")->with("message", "Deleted successfully");
    }
}
