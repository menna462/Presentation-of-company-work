@extends('backend.dashboard')
@section('main')
<div class="container ">
    <div class="row">
      <div class="col-md-8  align-items-center ">
        <h3 class="text-center mb-3">Details of product <span class="badge badge-primary">{{$users ->count()}}</span> </h3>
        <table class="table ">
          <thead>
            <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Password</td>
                    <td>Operation</td>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td> {{$users->id}} </td>
                  <td> {{$users->name}} </td>
                  <td>{{$users->email}}</td>
                  <td>{{$users->password}}</td>
                  <td>
                  <a href={{ route('users') }} class="btn btn-success">
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
