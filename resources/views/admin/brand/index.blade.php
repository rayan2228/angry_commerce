@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card avtivity-card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="fs-14 mb-2">Total Brand</p>
                            <span class="title text-black font-w600">{{ $brand_count }}</span>
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
                            <p class="fs-14 mb-2">Total Popular Brand</p>
                            <span class="title text-black font-w600">{{ $popular_brand_count }}</span>
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
        @forelse ($brands as $brand)
            <div class="col-lg-6">
                <div class="card mb-3">
                    <img class="card-img-top embed-responsive-item " src="{{ asset('uploads/brand') }}/{{ $brand->brand_image }}"
                        alt="{{ $brand->brand_image }}">
                    <div class="card-header">
                        <h5 class="card-title">{{ $brand->brand_name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {{ Str::limit($brand->brand_description, 100, '...') }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <p
                            class="card-text d-inline badge  @if ($brand->brand_status === 1) badge-success
                    @else 
                        badge-danger @endif">
                            @if ($brand->brand_status === 1)
                                active
                            @else
                                inactive
                            @endif
                        </p>
                        <p class="card-text d-inline">
                            <a href="{{ route('admin.brand.show', ['brand' => $brand->id]) }}"
                                class="card-link float-right btn btn-info btn-sm">Details</a>
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <h4 class="text-danger">No Brands Available</h4>
        @endforelse
        {{ $brands->withQueryString()->links() }}
    </div>
@endsection
{{-- "style="width: 100%;
                    height: 15vw;
                    object-fit: contain;"  --}}