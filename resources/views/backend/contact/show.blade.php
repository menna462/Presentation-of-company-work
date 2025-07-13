@extends('backend.dashboard')
@section('main')
    <div class="container ">
        <div class="row">
            <div class="col-md-8  align-items-center ">
                <h3 class="text-center mb-3">Details of product <span
                        class="badge badge-primary">{{ $contacts->count() }}</span> </h3>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Map</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ $contacts->id }} </td>
                            <td> {{ $contacts->phone }} </td>
                            <td>{{ $contacts->email }}</td>
                            <td>{{ $contacts->address }}</td>
                            <td>{{ $contacts->location_map }}</td>
                            <td>
                                <a href={{ route('contacts') }} class="btn btn-success">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
