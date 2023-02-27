<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:permissions|max:255',
            'description' => 'nullable|max:255',
        ]);

        $permission = Permission::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully!');
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.show', ['permission' => $permission]);
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', ['permission' => $permission]);
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id . '|max:255',
            'description' => 'nullable|max:255',
        ]);

        $permission->name = $validatedData['name'];
        $permission->description = $validatedData['description'];
        $permission->save();

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully!');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully!');
    }
}
