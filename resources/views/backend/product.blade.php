@extends('backend.dashboard')
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>

            </div>
            <a href="{{ route('product.create') }}" class="btn btn-success"> Create New News</a>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Category</th>
                                <th>name</th>
                                <th>Description</th>
                                <th>operation</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($product as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ Str::limit($item->description, 30) }}</td>

                                    <td>
                                        <a href={{ route('product.show', $item->id) }} class="btn btn-success"><i
                                                class="fa-solid fa-eye"></i></a>

                                        <a href={{ route('product.edit', $item->id) }} class="btn btn-primary"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        <a href={{ route('product.delete', $item->id) }} class="btn btn-success">
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
