<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function show()
    {
        // 
    }

    public function insert()
    {
        // return view('admin.insert');
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'image' => 'required|max:10000',
        // ]);

        // $save = new Asset();
        // if ($request->hasfile('image')) {
        //     $file = $request->file('image');
        //     $extention = $file->getClientOriginalExtension();
        //     $save->filename = $filename = time() . '.' . $extention;
        //     $file->move('uploads/maps/', $filename);
        // }
        // $save->name = $request->input('name');
        // $save->coordinates = $request->input('titik');
        // $save->save();

        // return redirect()->route('admin.show')->with('status', 'Image Has been uploaded');
    }

    public function edit(Request $request, $id)
    {
        // $assets = Asset::find($id);
        // return view('admin.edit', compact('assets'));
    }

    public function update(Request $request, $id)
    {
        // $asset = Asset::find($id);
        // $asset->name = $request->input('tempat');
        // $asset->coordinates = $request->input('titik');
        // if ($request->hasfile('image')) {
        //     $destination = 'uploads/maps/' . $asset->filename;
        //     if (File::exists($destination)) {
        //         File::delete($destination);
        //     }
        //     $file = $request->file('image');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extention;
        //     $file->move('uploads/maps/', $filename);
        //     $asset->filename = $filename;
        // }
        // $asset->update();
        // return redirect()->route('admin.show')->with('success', 'Update Successful');
    }

    public function destroy($id)
    {
        // $assets = Asset::find($id);
        // $destination = 'uploads/maps/' . $assets->filename;
        // if (File::exists($destination)) {
        //     File::delete($destination);
        // }
        // $assets->delete();
        // return redirect()->back()->with('status', 'Data Deleted Successfully');
    }
}