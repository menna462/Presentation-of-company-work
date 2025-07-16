@extends('backend.dashboard')
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>

            </div>
            <a href="{{ route('imgproduct.create') }}" class="btn btn-success"> Create New Imgproduct</a>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name Product</th>
                                <th>Image</th>
                                <th>operation</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($imgproduct as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>
                                        @if ($item->image_path)
                                            <img src="{{ asset(path: 'imges/products/'. $item->image_path) }}" width="100" alt="Image">
                                        @else
                                            لا توجد صورة
                                        @endif
                                    </td>
                                    <td>

                                        <a href={{ route('imgproduct.edit', $item->id) }} class="btn btn-primary"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        <a href={{ route('imgproduct.delete', $item->id) }} class="btn btn-success">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <br>

    </div>
    <!-- /.container-fluid -->
@endsection
