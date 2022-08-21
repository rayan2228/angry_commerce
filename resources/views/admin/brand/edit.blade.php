@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="pt-3">
                        <div class="settings-form">
                            @if (session('brand_update'))
                                <div class="alert alert-success" role="alert">
                                    <h5>{{ session('brand_update') }}</h5>
                                </div>
                            @endif
                            <h4 class="text-primary">Update Brand</h4>
                            <form action="{{ route('admin.brand.update',['brand' => $brand->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Brand Name</label>
                                        <input style="color: black; border-color:rgba(128, 128, 128, 0.365);" type="text"
                                            class="form-control" name="brand_name"  value="{{ $brand->brand_name }}">
                                        @error('brand_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Brand Slug </label>
                                        <input style="color: black; border-color:rgba(128, 128, 128, 0.365);" type="text"
                                            class="form-control" name="brand_slug"  value="{{ $brand->brand_slug }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Brand Photo</label>
                                        <input class="form-control" type="file" name="brand_image">
                                        @error('brand_image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Brand Description</label>
                                        <div class="mb-3">
                                            <textarea style="color: black; border-color:rgba(128, 128, 128, 0.365);"class="form-control" name="brand_description"
                                                rows="10">{{ $brand->brand_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Brand Status</label>
                                        <select style="color: black; border-color:rgba(128, 128, 128, 0.365);"
                                            name="brand_status" class="form-control">
                                            <option value="1" @selected($brand->brand_status === 1)>active</option>
                                            <option value="0" @selected($brand->brand_status === 0)>inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Brand Type</label>
                                        <select style="color: black; border-color:rgba(128, 128, 128, 0.365);"
                                            name="brand_type" class="form-control">
                                            <option value="normal" @selected($brand->brand_type === 'normal')>normal</option>
                                            <option value="popular_brand" @selected($brand->brand_type === 'popular_brand')>popular brand</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
