@extends('backend.dashboard')
@section('main')
<div class="container ">
    <div class="row">
      <div class="col-md-8  align-items-center ">
        <h3 class="text-center mb-3">Details of product <span class="badge badge-primary">{{$service ->count()}}</span> </h3>
        <table class="table ">
          <thead>
            <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Paragraph</td>
                    <td>Image</td>
                    <td>Operation</td>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td> {{$service->id}} </td>
                  <td> {{$service->title}} </td>
                  <td>{{$service->paragraph}}</td>
                    <img src="{{ asset('storage/' . $service->image) }}" width="100" alt="Image">
                  <td>
                  <a href={{ route('service') }} class="btn btn-success">
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

