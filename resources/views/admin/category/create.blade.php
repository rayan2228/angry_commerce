@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="pt-3">
                        <div class="settings-form">
                            @if (session('category_add'))
                                <div class="alert alert-success" role="alert">
                                    <h5>{{ session('category_add') }}</h5>
                                </div>
                            @endif
                            <h4 class="text-primary">Add Category</h4>
                            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Ctegory Name</label>
                                        <input style="color: black; border-color:rgba(128, 128, 128, 0.365);" type="text"
                                            class="form-control" name="category_name" value="{{ old('category_name') }}">
                                        @error('category_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Category Slug </label>
                                        <input style="color: black; border-color:rgba(128, 128, 128, 0.365);" type="text"
                                            class="form-control" name="category_slug" value="{{ old('category_slug') }}">
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
                                                rows="10">{{ old('category_description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Category Status</label>
                                        <select style="color: black; border-color:rgba(128, 128, 128, 0.365);"
                                            name="category_status" class="form-control">
                                            <option value="1">active</option>
                                            <option value="0">inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Category Type</label>
                                        <select style="color: black; border-color:rgba(128, 128, 128, 0.365);"
                                            name="category_type" class="form-control">
                                            <option value="normal">normal</option>
                                            <option value="top_category">top Category</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
