@extends('backend.dashboard')
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>

            </div>
            <a href="{{ route('user.create') }}" class="btn btn-success"> Create New User</a>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Role</th>
                                <th>operation</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>
                                        <a href={{ route('user.show', $item->id) }} class="btn btn-success"><i
                                                class="fa-solid fa-eye"></i></a>

                                        <a href={{ route('user.edit', $item->id) }} class="btn btn-primary"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        <a href={{ route('user.delete', $item->id) }} class="btn btn-success">
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
