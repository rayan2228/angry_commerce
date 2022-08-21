@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="pt-3">
                        <div class="settings-form">
                            @if (session('category_update'))
                                <div class="alert alert-success" role="alert">
                                    <h5>{{ session('category_update') }}</h5>
                                </div>
                            @endif
                            <h4 class="text-primary">Update Category</h4>
                            <form action="{{ route('admin.category.update', ['category' => $category->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Ctegory Name</label>
                                        <input style="color: black; border-color:rgba(128, 128, 128, 0.365);" type="text"
                                            class="form-control" name="category_name"
                                            value="{{ $category->category_name }}">
                                        @error('category_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Category Slug </label>
                                        <input style="color: black; border-color:rgba(128, 128, 128, 0.365);" type="text"
                                            class="form-control" name="category_slug"
                                            value="{{ $category->category_slug }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Category Photo</label>
                                        <input class="form-control" type="file" name="category_image">
                                        @error('category_image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Category Description</label>
                                        <div class="mb-3">
                                            <textarea style="color: black; border-color:rgba(128, 128, 128, 0.365);"class="form-control" name="category_description"
                                                rows="10">{{ $category->category_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Category Status</label>
                                        <select style="color: black; border-color:rgba(128, 128, 128, 0.365);"
                                            name="category_status" class="form-control">
                                            <option value="1" @selected($category->status === 1)>active</option>
                                            <option value="0" @selected($category->status === 0)>inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Category Type</label>
                                        <select style="color: black; border-color:rgba(128, 128, 128, 0.365);"
                                            name="category_type" class="form-control">
                                            <option value="normal" @selected($category->category_type === 'normal')>normal</option>
                                            <option value="top_category" @selected($category->category_type === 'top_category')>top Category</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
