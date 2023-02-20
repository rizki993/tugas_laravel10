<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AdminObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $obats = \App\Models\Obat::all();
        return view('admin.modules.obat.index', compact('obats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $is_add = true;
        $categories = \App\Models\Category::all();
        return view('admin.modules.obat.form', compact('categories', 'is_add'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'obat_image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        try {
            $obat = new \App\Models\Obat();
            $obat->name = $request->name;
            $obat->description = $request->description;
            $obat->price = $request->price;
            $obat->stock = $request->stock;
            $obat->category_id = $request->category_id;

            // upload image
            $image = $request->file('obat_image');
            //encrypt and make unique name
            $image_name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            // save to storage/app/public
            $image->storeAs('public/images', $image_name);

            $obat->image = $image_name;
            $obat->save();

            return redirect()->route('admin.obat.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $is_add = false;
        $categories = \App\Models\Category::all();
        $obat = \App\Models\Obat::find($id);
        return view('admin.modules.obat.form', compact('categories', 'is_add', 'obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'obat_image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        try {

            $obat = \App\Models\Obat::find($id);
            $obat->name = $request->name;
            $obat->description = $request->description;
            $obat->price = $request->price;
            $obat->stock = $request->stock;
            $obat->category_id = $request->category_id;

            // upload image
            if ($request->hasFile('obat_image')) {
                $image = $request->file('obat_image');
                //encrypt and make unique name
                $image_name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
                // save to storage/app/public
                $image->storeAs('public/images', $image_name);
                $obat->image = $image_name;
            }

            $obat->save();

            return redirect()->route('admin.obat.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $obat = \App\Models\Obat::find($id);
        $obat->delete();
        return redirect()->route('admin.obat.index');
    }
}
