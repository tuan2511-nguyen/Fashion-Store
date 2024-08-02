<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $users = User::query()->where('role', 'customer')->get();
        return view('admin.pages.customers.index', compact('users'));
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('customers.index')->with('success', 'Người dùng đã được xóa thành công.');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.pages.customers.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,user',
        ]);

        // Chỉ cập nhật trường 'role'
        $user->update([
            'role' => $request->input('role'),
        ]);

        return redirect()->route('customers.index')->with('success', 'Role updated successfully.');
    }
}
