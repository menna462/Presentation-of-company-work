@extends('backend.dashboard')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <h3 class="text-center mb-4">
                تفاصيل المنتج
            </h3>

            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>اسم المنتج</th>
                        <th>الوصف</th>
                        <th>الفئة</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category?->name ?? 'غير محدد' }}</td>

                        <td>
                            <a href="{{ route('product') }}" class="btn btn-sm btn-primary" title="العودة">
                                <i class="fa fa-arrow-left"></i> العودة
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
