@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="card avtivity-card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="fs-14 mb-2">Total Category</p>
                        <span class="title text-black font-w600">{{ $category_count }}</span>
                    </div>
                </div>
            </div>
            <div class="effect bg-success" style="top: 482px; left: 242px;"></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card avtivity-card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="fs-14 mb-2">Total Top Category</p>
                        <span class="title text-black font-w600">{{ $top_category_count }}</span>
                    </div>
                </div>
            </div>
            <div class="effect bg-secondary" style="top: 146px; left: 183.5px;"></div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <form class="d-flex justify-content-between mb-3" action="" method="get">
                <input class="form-control " type="text" name="search" value="{{ $search }}"
                    style="width: 90% ;border-color:black;">
                <button type="submit" class="btn btn-secondary btn-sm ">Search</button>
            </form>
        </div>
    </div>
   
    <div class="row">
        @forelse ($categories as $category)
            <div class="col-lg-6">
                <div class="card mb-3">
                    <img class="card-img-top embed-responsive-item "  src="{{ asset('uploads/category') }}/{{ $category->category_image }}"
                        alt="{{ $category->category_image }}">
                    <div class="card-header">
                        <h5 class="card-title">{{ $category->category_name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {{ Str::limit($category->category_description, 100, '...') }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <p
                            class="card-text d-inline badge  @if ($category->status === 1) badge-success
                        @else 
                            badge-danger @endif">
                            @if ($category->status === 1)
                                active
                            @else
                                inactive
                            @endif
                        </p>
                        <a href="{{ route('admin.category.show', ['category' => $category->id]) }}"
                            class="card-link float-right btn btn-info btn-sm">Details</a>
                    </div>
                </div>
            </div>
        @empty
            <h4 class="text-danger">No Categories Available</h4>
        @endforelse
        {{ $categories->withQueryString()->links() }}
    </div>
@endsection
