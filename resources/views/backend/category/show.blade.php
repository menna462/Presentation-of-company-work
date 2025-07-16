@extends('backend.dashboard')
@section('main')
<div class="container ">
    <div class="row">
      <div class="col-md-8  align-items-center ">
        <h3 class="text-center mb-3">Details of Category <span class="badge badge-primary">{{$category ->count()}}</span> </h3>
        <table class="table ">
          <thead>
            <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Operation</td>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td> {{$category->id}} </td>
                  <td> {{$category->name}} </td>

                  <td>
                  <a href={{ route('category') }} class="btn btn-success">
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

