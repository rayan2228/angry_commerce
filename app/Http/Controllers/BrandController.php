<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search ?? "";
        $brand_count = Brand::count();
        $popular_brand_count = Brand::where("brand_type", "popular_brand")->count();
        if ($search) {
            $brands = Brand::where("brand_name", "LIKE", "%$search%")->orWhere("brand_type", "LIKE", "%$search%")->Paginate(2);
        } else {
            $brands = Brand::Paginate(2);
        }
        return view('admin.brand.index', compact("brands", "search", "brand_count", "popular_brand_count"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "brand_name" => "required |unique:brands,brand_name",
            "brand_image" => "mimes:png,jpg"
        ]);
        if ($request->brand_slug) {
            $slug = Str::slug(Str::lower($request->brand_slug), "_");
        } else {
            $slug = Str::slug(Str::lower($request->brand_name), "_");
        }
        // brand image
        if ($request->hasFile("brand_image")) {
            $brand_image_name = Str::replace(' ', '_', Str::lower($request->brand_name)) . "_" . auth()->user()->id . "_" . time() . Carbon::now()->format("Y") . "." . $request->file('brand_image')->getClientOriginalExtension();
            $brand_image = Image::make($request->file('brand_image'))->resize(383, 83);
            $brand_image->save(base_path("public/uploads/brand/" . $brand_image_name), 80);
            Brand::insert([
                "brand_name" => $request->brand_name,
                "brand_slug" => $slug,
                "brand_description" => $request->brand_description,
                "brand_status" => $request->brand_status,
                "brand_type" => $request->brand_type,
                "brand_image" => $brand_image_name,
                "created_at" => Carbon::now(),
            ]);
        } else {
            Brand::insert([
                "brand_name" => $request->brand_name,
                "brand_slug" => $slug,
                "brand_description" => $request->brand_description,
                "brand_status" => $request->brand_status,
                "brand_type" => $request->brand_type,
                "created_at" => Carbon::now(),
            ]);
        }
        return back()->with("brand_add", "brand added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        if ($request->has('brand_name') && $request->brand_name !==  $brand->brand_name) {
            $request->validate([
                "brand_name" => "required | unique:brands,brand_name",
                "brand_image" => "mimes:png,jpg"
            ]);
        }
        if ($request->brand_slug) {
            $slug = Str::slug(Str::lower($request->brand_slug), "_");
        } else {
            $slug = Str::slug(Str::lower($request->brand_name), "_");
        }
        // brand image
        if ($request->hasFile("brand_image") && $brand->brand_image != null) {
            unlink(base_path("public/uploads/brand/" . $brand->brand_image));
            $brand_image_new_name = Str::replace(' ', '_', Str::lower($request->brand_name)) . "_" . auth()->user()->id . "_" . time() . Carbon::now()->format("Y") . "." . $request->file('brand_image')->getClientOriginalExtension();
            $brand_image = Image::make($request->file('brand_image'))->resize(383, 83);
            $brand_image->save(base_path("public/uploads/brand/" . $brand_image_new_name), 80);
            $brand->update([
                "brand_name" => $request->brand_name,
                "brand_slug" => $slug,
                "brand_description" => $request->brand_description,
                "brand_image" => $brand_image_new_name,
                "brand_status" => $request->brand_status,
                "brand_type" => $request->brand_type,
            ]);
        } elseif ($request->hasFile("brand_image") && $brand->brand_image === null) {
            $brand_image_new_name = Str::replace(' ', '_', Str::lower($request->brand_name)) . "_" . auth()->user()->id . "_" . time() . Carbon::now()->format("Y") . "." . $request->file('brand_image')->getClientOriginalExtension();
            $brand_image = Image::make($request->file('brand_image'))->resize(383, 83);
            $brand_image->save(base_path("public/uploads/brand/" . $brand_image_new_name), 80);
            $brand->update([
                "brand_name" => $request->brand_name,
                "brand_slug" => $slug,
                "brand_description" => $request->brand_description,
                "brand_image" => $brand_image_new_name,
                "brand_status" => $request->brand_status,
                "brand_type" => $request->brand_type,
            ]);
        } else {
            $brand->update([
                "brand_name" => $request->brand_name,
                "brand_slug" => $slug,
                "brand_description" => $request->brand_description,
                "brand_status" => $request->brand_status,
                "brand_type" => $request->brand_type,
            ]);
        }
        return back()->with("brand_update", "brand updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect(route('admin.brand.index'));
    }
}
