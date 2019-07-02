@extends('home')
@section('title', 'List Customer')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="text-primary text-center"><h1>Danh sách khách hàng</h1></div>
            <div class="col-12">
                @if(Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tỉnh thành</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($customers as $key => $customer)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->dob}}</td>
                            <td>{{$customer->email}}</td>
                            @if(isset($customer->city))
                                <td>{{$customer->city->name}}</td>
                            @else
                                <td>không có dữ liệu!</td>
                            @endif
                            <td><a href="{{'customers.show'}}">
                                    <button type="button" class="btn btn-warning">Xem</button>
                                </a>
                            </td>
                            <td><a class="btn btn-primary" href="{{route('customers.edit', $customer->id)}}">Sửa</a>
                            </td>
                            <td><a class="btn btn-danger" href="{{route('customers.destroy', $customer->id)}}"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                            </td>


                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a href="{{route('customers.create')}}">
                <button type="button" class="btn btn-primary">Thêm mới</button>

            </a>
        </div>
    </div>
@endsection
