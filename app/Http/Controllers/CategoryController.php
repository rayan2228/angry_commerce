<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search ?? "";
        $category_count = Category::count();
        $top_category_count = Category::where("category_type","top_category")->count();
        if ($search) {
            $categories = Category::where("category_name", "LIKE", "%$search%")->orWhere("category_type", "LIKE", "%$search%")->Paginate(2);
        } else {
            $categories = Category::Paginate(2);;
        }
        return view('admin.category.index', compact("categories","search","category_count","top_category_count"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            "category_name" => "required | unique:categories,category_name",
            "category_image" => "mimes:png,jpg"
        ]);
        if ($request->category_slug) {
            $slug = Str::slug(Str::lower($request->category_slug), "_");
        } else {
            $slug = Str::slug(Str::lower($request->category_name), "_");
        }
        // category image
        if ($request->hasFile("category_image")) {
            $category_image_name = Str::replace(' ', '_', Str::lower($request->category_name)) . "_" . auth()->user()->id . "_" . time() . Carbon::now()->format("Y") . "." . $request->file('category_image')->getClientOriginalExtension();
            $category_image = Image::make($request->file('category_image'))->resize(200, 256);
            $category_image->save(base_path("public/uploads/category/" . $category_image_name), 80);
            Category::insert([
                "category_name" => $request->category_name,
                "category_slug" => $slug,
                "category_description" => $request->category_description,
                "status" => $request->category_status,
                "category_type" => $request->category_type,
                "category_image" => $category_image_name,
                "created_at" => Carbon::now(),
            ]);
        }else{
            Category::insert([
                "category_name" => $request->category_name,
                "category_slug" => $slug,
                "category_description" => $request->category_description,
                "status" => $request->category_status,
                "category_type" => $request->category_type,
                "created_at" => Carbon::now(),
            ]);
        }
        return back()->with("category_add", "category added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "category_name" => "required | unique:categories,category_name",
            "category_image" => "mimes:png,jpg"
        ]);
        if ($request->category_slug) {
            $slug = Str::slug(Str::lower($request->category_slug), "_");
        } else {
            $slug = Str::slug(Str::lower($request->category_name), "_");
        }
        // category image
        if ($request->hasFile("category_image") && $category->category_image != null) {
            unlink(base_path("public/uploads/category/" . $category->category_image));
            $category_image_new_name = Str::replace(' ', '_', Str::lower($request->category_name)) . "_" . auth()->user()->id . "_" . time() . Carbon::now()->format("Y") . "." . $request->file('category_image')->getClientOriginalExtension();
            $category_image = Image::make($request->file('category_image'))->resize(200, 256);
            $category_image->save(base_path("public/uploads/category/" . $category_image_new_name), 80);
            $category->update([
                "category_name" => $request->category_name,
                "category_slug" => $slug,
                "category_description" => $request->category_description,
                "category_image" => $category_image_new_name,
                "status" => $request->category_status,
                "category_type" => $request->category_type,
            ]);
        } elseif ($request->hasFile("category_image") && $category->category_image === null) {
            $category_image_new_name = Str::replace(' ', '_', Str::lower($request->category_name)) . "_" . auth()->user()->id . "_" . time() . Carbon::now()->format("Y") . "." . $request->file('category_image')->getClientOriginalExtension();
            $category_image = Image::make($request->file('category_image'))->resize(200, 256);
            $category_image->save(base_path("public/uploads/category/" . $category_image_new_name), 80);
            $category->update([
                "category_name" => $request->category_name,
                "category_slug" => $slug,
                "category_description" => $request->category_description,
                "category_image" => $category_image_new_name,
                "status" => $request->category_status,
                "category_type" => $request->category_type,
            ]);
        }else{
            $category->update([
                "category_name" => $request->category_name,
                "category_slug" => $slug,
                "category_description" => $request->category_description,
                "status" => $request->category_status,
                "category_type" => $request->category_type,
            ]);
        }
        return back()->with("category_update", "category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('admin.category.index'));
    }
}
