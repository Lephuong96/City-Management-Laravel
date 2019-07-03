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
            <div class="col-6">

                <form class="navbar-form navbar-left" action="{{ route('customers.search') }}" method="get">

                    @csrf

                    <div class="row">

                        <div class="col-8">

                            <div class="form-group">

                                <input type="text" class="form-control" name="keyword" placeholder="Search" value="{{(isset($_GET['keyword'])) ? $_GET['keyword'] : ''}}">


                            </div>

                        </div>

                        <div class="col-4">

                            <button type="submit" class="btn btn-dark">Tìm kiếm</button>

                        </div>

                    </div>

                </form>


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
                                <a class="btn btn-primary" href="{{route('customers.edit', $customer->id)}}">Sửa</a>
                                <a class="btn btn-danger" href="{{route('customers.destroy', $customer->id)}}"
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
            {{ $customers->appends(request()->query()) }}
        </div>
    </div>
@endsection
