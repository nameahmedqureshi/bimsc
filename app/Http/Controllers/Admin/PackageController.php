<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.backend.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.backend.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'project_limit' => 'required|integer|min:0',
            'task_limit_per_project' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        Package::create($request->only(['title', 'project_limit', 'task_limit_per_project', 'price']));

        return response()->json([
        'status' => true,
        'title' => 'Success',
        'message' => 'Package created successfully.',
        'icon' => 'success',
        'auto_redirect' => false,
        'redirect_url' => route('admin.packages.index')
    ]);
    }

    public function edit(Package $package)
    {
        return view('admin.backend.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'project_limit' => 'required|integer|min:0',
            'task_limit_per_project' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $package->update($request->only(['title', 'project_limit', 'task_limit_per_project', 'price']));

         return response()->json([
        'status' => true,
        'title' => 'Updated',
        'message' => 'Package updated successfully.',
        'icon' => 'success',
        'auto_redirect' => true,
        'redirect_url' => route('admin.packages.index')
    ]);
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted.');
    }
}
