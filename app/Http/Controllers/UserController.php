<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ✅ عرض كل المستخدمين
    public function index()
    {
        $users = User::all();
        return view('backend.users', compact('users'));
    }

    // ✅ عرض فورم إنشاء مستخدم جديد
    public function create()
    {
        return view('backend.users.create');
    }

    // ✅ حفظ مستخدم جديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users')->with('message', 'Created successfully');
    }

    // ✅ عرض مستخدم واحد بالتفصيل
    public function show(string $id)
    {
        $users = User::findOrFail($id);
        return view('backend.users.show', compact('users'));
    }

    // ✅ عرض فورم تعديل مستخدم
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('backend.users.edit', ["result" => $users]);
    }

    // ✅ تحديث بيانات مستخدم
    public function update(Request $request)
    {
        $old_id = $request->old_id;
        $users = User::findOrFail($old_id);

        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $old_id,
            'role' => 'required|in:admin,user',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:8',
            ]);
            $data['password'] = bcrypt($request->password);
        }

        $users->update($data);

        return redirect()->route('users')->with('message', 'Updated successfully');
    }

    // ✅ حذف مستخدم
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users')->with('message', 'Deleted successfully');
    }
}
