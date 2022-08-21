@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3">
            <img class="card-img-top embed-responsive-item   "  src="{{ asset('uploads/category') }}/{{ $category->category_image }}" alt="{{ $category->category_image }}">
            <div class="card-header">
                <h5 class="card-title">{{ $category->category_name }}</h5>
                <h5 class="card-title badge badge-info text-white">{{ Str::title( Str::replace("_"," ",$category->category_type)) }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">
                    {{ $category->category_description }}
                </p>
            </div>
            <div class="card-footer">
                <p class="card-text d-inline badge  @if ($category->status === 1) 
                    badge-success
                @else 
                    badge-danger
                @endif">@if ($category->status === 1) 
                    active
                @else 
                    inactive
                @endif</p>
                <form action="{{ route('admin.category.destroy',['category'=> $category->id])  }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger card-link float-right "  style="margin-top: -20px;" >Delete</button>
                </form>
                <a href="{{ route('admin.category.edit',['category'=> $category->id])  }}" class="card-link float-right btn btn-warning" style="margin-top: -20px; margin-right:8px">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection

