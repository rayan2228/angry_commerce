@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card avtivity-card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="fs-14 mb-2">Total Admin</p>
                            <span class="title text-black font-w600">{{ $total_admin }}</span>
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
                            <p class="fs-14 mb-2">Total Editor</p>
                            <span class="title text-black font-w600">{{ $total_editor }}</span>
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table  table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($editors as $editor)
                                @if ($editor->id === Auth::guard('admin')->id())
                                    @continue
                                @endif
                                <tr>
                                    <td>
                                        <h6>{{ $editor->name }}</h6>

                                    </td>
                                    <td>
                                        <h6> {{ $editor->email }}</h6>

                                    </td>
                                    <td>
                                        <h6
                                            class="badge @if ($editor->role === 'admin') badge-success
                                            @else
                                            badge-danger @endif ">
                                            {{ $editor->role }}</h6>

                                    </td>
                                    <td>
                                        <a class="badge badge-info"
                                            href="{{ route('admin.user.show', ['user' => $editor->id]) }}">details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $editors->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
