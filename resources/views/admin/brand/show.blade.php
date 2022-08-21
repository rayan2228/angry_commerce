@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <img class="card-img-top embed-responsive-item  " src="{{ asset('uploads/brand') }}/{{ $brand->brand_image }}"
                    alt="{{ $brand->brand_image }}">
                <div class="card-header">
                    <h5 class="card-title">{{ $brand->brand_name }}</h5>
                    <h5 class="card-title badge badge-info text-white">
                        {{ Str::title(Str::replace('_', ' ', $brand->brand_type)) }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{ $brand->brand_description }}
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
                    <form action="{{ route('admin.brand.destroy', ['brand' => $brand->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger card-link float-right "
                            style="margin-top: -30px;">Delete</button>
                    </form>
                    <a href="{{ route('admin.brand.edit', ['brand' => $brand->id]) }}"
                        class="card-link float-right btn btn-warning" style="margin-top: -30px; margin-right:8px">Edit</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
